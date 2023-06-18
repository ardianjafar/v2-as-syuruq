<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role_show',['only' => 'index']);
        $this->middleware('permission:role_create',['only' => ['create','store']]);
        $this->middleware('permission:role_update',['only' => ['edit','update']]);
        $this->middleware('permission:role_detail',['only' => 'show']);
        $this->middleware('permission:role_destroy',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    private $perPage = 10;
    public function index(Request $request)
    {
        $roles = [];
        if($request->has('keyword')) {
            $roles = Role::where('name','LIKE',"%{$request->keyword}%")->paginate($this->perPage);
        }else{
            $roles = Role::paginate($this->perPage);
        }
        return view('administrator.roles.index',[
            'roles' => $roles->appends(['keyword' => $request->keyword]),
        ]);
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
    public function create(Role $role)
    {

        return view('administrator.roles.create',[
            'authorities' => config('permission.authorities'),
            'role'  => $role,
            't_create' => "Create Roles"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name'          => ['required','string','max:50','unique:roles,name'],
                'permissions'   => ['required']
            ],[

        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try{
            $role = Role::create(['name'  => $request->name]);
            $role->givePermissionTo($request->permissions);
            Alert::success(
                "Create Roles",
                "Roles berhasil di buat"
            );

            return redirect()->route('administrator.roles.index');
        } catch (\Throwable $th) {
            DB::roolBack();
            Alert::error(
                "Create Roles",
                "Roles gagal di buat",['error' => $th->getMessage()]
            );
            return redirect()->back()->withInput($request->all());
        }
        finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('administrator.roles.detail_roles',[
            'role'  => $role,
            'authorities'   => config('permission.authorities'),
            'rolePermissions' => $role->permissions->pluck('name')->toArray(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('administrator.roles.edit',[
            'role'  => $role,
            'authorities' => config('permission.authorities'),
            'permissionChecked' => $role->permissions->pluck('name')->toArray(),
            't_edit'    => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Role $role)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'          => ['required','string','max:50','unique:roles,name,' . $role->id],
                'permissions'   => ['required']
            ],[

        ]
        );

        if($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try{
            $role->name = $request->name;
            $role->syncPermissions($request->permissions);
            $role->save();
            Alert::success(
                "Update Roles",
                "Roles berhasil di update"
            );
            return redirect()->route('administrator.roles.index');
        } catch (\Throwable $th) {
            DB::roolBack();
            Alert::error(
                "Update Roles",
                "Roles gagal di update",['error' => $th->getMessage()]
            );
            return redirect()->back()->withInput($request->all());
        }
        finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if(User::role($role->name)->count()){
            Alert::warning(
                "Delete Role",
                "Tidak dapat di hapus karena masih di gunakan", ['name' => $role->name]
            );
            return redirect()->back();
        }
        DB::beginTransaction();
        try{
            $role->revokePermissionTo($role->permissions->pluck('name')->toArray());
            $role->delete();
            Alert::success(
                "Delete Role",
                "Role Has Been Deleted"
            );
        } catch (\Throwable $th) {
            DB::roolBack();
            Alert::error(
                "Delete Role",
                "Error To Delete Role",['error' => $th->getMessage()]
            );
        }
        finally {
            DB::commit();
        }
        return redirect()->back();
    }
}
