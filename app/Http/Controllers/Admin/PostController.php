<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\{Post, Category, Tag};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        dd("oke");
        $posts = Post::latest()->get();
        return view('administrator.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('administrator.post.create',[
            'categories'    => Category::with('descendants')->onlyParent()->get(),
            'statuses'      => $this->statuses(),
            't_create'      => "Create",
            'post'          => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                "title"         => ['required','string','max:60'],
                "slug"          => ['required','string','unique:posts,slug'],
                "thumbnail"     => ['required'],
                "description"   => ['required','string','max:240'],
                "content"       => ['required'],
                "category"      => ['required'],
                "tag"           => ['required'],
                "status"        => ['required'],
            ],
        );

        if($validator->fails()){
            if($request['tag']){
                $request['tag'] = Tag::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $post = Post::create([
                'title'         => $request->title,
                'slug'          => $request->slug,
                'thumbnail'     => parse_url($request->thumbnail)['path'],
                'description'   => $request->description,
                'content'       => $request->content,
                'status'        => $request->status,
                'user_id'       => Auth::user()->id

            ]);

            $post->tags()->attach($request->tag);
            $post->categories()->attach($request->category);

            Alert::success(
                "Sukses",
                "Postingan berhasil di buat"
            );

            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                "Gagal",
                "Postingan gagal di buat",['error' => $th->getMessage()]
            );

            if($request['tag']){
                $request['tag'] = Tag::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
//        $post = Post::get();
        return view('administrator.post.edit',[
            'post'  => $post,
            'categories'    => Category::with('descendants')->onlyParent()->get(),
            'statuses'      => $this->statuses(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        DB::beginTransaction();
        try {
            $post->tags()->detach();
            $post->categories()->detach();
            $post->delete();

            Alert::success(
                "Berhasil",
                "Post Berhasil Di Hapus"
            );
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                "Gagal",
                "Post gagal di hapus", ['error' => $th->getMessage()]
            );
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }

    private function statuses()
    {
        return [
            'draft'     => "Draft",
            'publish'   => "Publish"
        ];
    }
}
