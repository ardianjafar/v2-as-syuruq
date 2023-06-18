<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $perPage = 10;

    public function index(Request $request)
    {
        $user = [];
        if($request->has('keyword')){
            $user = User::search($request->keyword)->paginate($this->perPage);
        }else {
            $user = User::paginate($this->perPage);
        }
        return view('administrator.users.index',[
            'users' => $user->appends(['keyword' => $request->keyword]),
        ]);

        return view('administrator.users.index');
    }

    public function select(Request $request)
    {
        $roles = Role::select('id','name')->limit(7);
        if($request->has('q')) {
            $roles->where('name','LIKE',"%{$request->q}%");
        }
        return response()->json($roles->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);
        $validator = Validator::make(
            $request->all(),
            [
                'name'      => ['required','string','max:30'],
                'role'      => ['required'],
                'email'     => ['required','email','unique:users,email'],
                'password'  => ['required','min:3','confirmed']
            ],
        );

        if($validator->fails()){
            $request['role']  = Role::select('id','name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'name'      => $request->name,
                'email'      => $request->email,
                'password'      => Hash::make($request->password),
            ]);

            $user->assignRole($request->role);
            Alert::success(
                "Berhasil",
                "Anda telah berhasil menambahkan user"
            );
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                "Gagal",
                "Anda gagal menambahkan user", ['error' => $th->getMessage()]
            );
            $request['role']  = Role::select('id','name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',[
            'user' => $user,
            'userSelected' => $user->roles->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'role'      => ['required'],
            ],
        );

        if($validator->fails()){
            $request['role']  = Role::select('id','name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $user->syncRoles($request->role);
            Alert::success(
                "Berhasil",
                "Anda telah berhasil update user"
            );
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                "Gagal",
                "Anda gagal update user", ['error' => $th->getMessage()]
            );
            $request['role']  = Role::select('id','name')->find($request->role);
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validator);
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->removeRole($user->roles->first());
            $user->delete();
            Alert::success(
                "Berhasil",
                "Anda berhasil menghapus user role"
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                "Gagal",
                "Anda gagal melakukan hapus user role", ['error' => $th->getMessage()]
            );
        } finally {
            DB::commit();
            return  redirect()->back();
        }
    }
}
