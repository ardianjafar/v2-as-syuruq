<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('permission:category_show',['only' => 'index']);
//        $this->middleware('permission:category_create',['only' => ['create','store']]);
//        $this->middleware('permission:category_update',['only' => ['edit','update']]);
//        $this->middleware('permission:category_detail',['only' => 'show']);
//        $this->middleware('permission:category_delete',['only' => 'destroy']);
//    }

    public function index()
    {
        return view('administrator.categories.index',[
            'categories' => Category::get()->all()
        ]);
    }

    public function select(Request $request)
    {
        $categories = [];
        if($request->has('q')){
            $search = $request->q;
            $categories = Category::select('id','title')->where('title', 'LIKE' , "%$search%")->limit(6)->get();
        }else{
            $categories = Category::select('id','title')->onlyParent()->limit(6)->get();
        }

        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $categories)
    {
        return view('administrator.categories.create', [
            't_create' => 'Create Category',
            'categories' => $categories
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
                'title'         => ['required','string','max:60'],
                'slug'          => ['required','string','unique:categories,slug'],
                'thumbnail'     => ['required'],
                'description'   => ['required','string','max:240']
            ]);
            if($validator->fails()){
                if($request->has('parent_category')){
                    $request['parent_category']     =  Category::select('id','title')->find($request->parent_category);
                }
                return redirect()->back()->withInput($request->all())->withErrors($validator);
            }

        /*
            Proses Insert data
        */
        try {
            Category::create([
                'title'     => $request->title,
                'slug'     => $request->slug,
                'thumbnail'     => parse_url($request->thumbnail)['path'],
                'description'   => $request->description,
                'parent_id'     => $request->parent_category,
            ]);
            Alert::success(
                "Berhasil",
                "Category berhasil di buat");
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            if($request->has('parent_category')){
                $request['parent_category'] = Category::select('id','title')->find($request->parent_category);
            }
            Alert::error(
                "Gagal",
                "Category tidak terbuat", ['error' => $th->getMessage()]);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('administrator.categories.edit',[
            't_update' => 'Update Category',
            'categories' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'         => ['required','string','max:60'],
                'slug'          => ['required','string','unique:categories,slug,' . $category->id],
                'thumbnail'     => ['required'],
                'description'   => ['required','string','max:240']
            ]);
        if($validator->fails()){
            if($request->has('parent_category')){
                $request['parent_category']     =  Category::select('id','title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all());
        }

        /*
            Proses Insert data
        */
        try {
            $category->update([
                'title'     => $request->title,
                'slug'     => $request->slug,
                'thumbnail'     => parse_url($request->thumbnail)['path'],
                'description'   => $request->description,
                'parent_id'     => $request->parent_category,
            ]);
            Alert::success(
                "Berhasil",
                "Category berhasil di update");
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            if($request->has('parent_category')){
                $request['parent_category'] = Category::select('id','title')->find($request->parent_category);
            }
            Alert::error(
                "Gagal",
                "Category Gagal di update", ['error' => $th->getMessage()]);
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            Alert::success(
                "Berhasil",
                "Category berhasil di hapus");
        } catch (\Throwable $th) {
            Alert::error(
                "Gagal",
                "Category gagal di hapus", ['error' => $th->getMessage()]);
        }

        return redirect()->back();
    }
}
