<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tag_show',['only' => 'index']);
        $this->middleware('permission:tag_create',['only' => ['create','store']]);
        $this->middleware('permission:tag_update',['only' => ['edit','update']]);
        $this->middleware('permission:tag_delete',['only' => 'destroy']);
    }

    private $perPage = 10;

    public function index()
    {
        $tags = Tag::latest()->get();
        return view('administrator.tags.index', compact('tags'));
    }

    public function select(Request $request)
    {
        $tags = [];
        if($request->has('q')) {
            $tags = Tag::select('id','title')->search($request->q)->get();
        } else {
            $tags = Tag::select('id','title')->limit(5)->get();
        }

        return response()->json($tags);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Tag $tags)
    {
        return view('administrator.tags.create', [
            't_create' => 'Create Tag',
            'tags'  => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'title'     => ['required','string','max:25'],
                'slug'      => ['required','string','unique:tags,slug']
            ])->validate();

        try {
            Tag::create([
                'title'     => $request->title,
                'slug'      => $request->slug
            ]);

            Alert::success(
                "Berhasil",
                "Tags sudah di buat"
            );
            return redirect()->route('administrator.tags.index');
        } catch (\Throwable $th) {
            Alert::error(
                "Gagal",
                "Tag gagal di buat", ['error' => $th->getMessage()]
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('administrator.tags.edit', [
            'tags' => $tag,
            't_update' => 'Update Tag',
        ]);
    }

    /**
     * Update the <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        Validator::make(
            $request->all(),
            [
                'title'     => ['required','string','max:25'],
                'slug'      => ['required','string','unique:tags,slug, ' . $tag->id]
            ]);
        try {
            $tag->update([
                'title'     => $request->title,
                'slug'      => $request->slug
            ]);

            Alert::success(
                "Berhasil",
                "Tags sudah di update"
            );
            return redirect()->route('administrator.tags.index');
        } catch (\Throwable $th) {
            Alert::error(
                "Gagal",
               "Tags tidak terupdate", ['error' => $th->getMessage()]);
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            Alert::success(
                "Berhasil",
                "Tags sudah berhasil di hapus"
            );
        } catch (\Throwable $th) {
            Alert::error(
                "Gagal",
                "Tags sudah berhasil di hapus", ['error' => $th->getMessage()]
            );
        }
        return redirect()->back();
    }
}
