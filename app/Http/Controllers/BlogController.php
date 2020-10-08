<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Auth;

class BlogController extends Controller {

    public function __construct() {
        $this->middleware('auth')->except(['show','index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $blog = Blog::all();
        return view('blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $user = Auth::user();
        $categories = BlogCategory::pluck('name','id');
        return view('blog.create', compact('user','categories'));
    }


    /**
     * Store a newly created resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:15',
            'body'  => 'required|min:10'
        ],
        [
            'title.required' => 'Diperlukan Title',
            'title.max'      => 'Title Harus Kurang dari 15 Huruf ',
            'body.required'  => 'Diperlukan Konten',
            'body.min'       => 'Konten Harus lebih dari 10 Huruf ',
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $blog = Blog::findOrFail($id);
        return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $blog = Blog::findOrFail($id);
        if(Auth::user()->id !== $blog->user->id) {
            return abort(403);
            // return redirect()->route('blog.index');
        }
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $blog->user->id,
            'category_id' => $blog->category->id,
        ]);
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        Blog::findOrFail($id)->delete();
        return redirect(route('blog.index'));
    }

    public function sampah(){
        $trash = Blog::onlyTrashed()->get();
        return view('blog.sampah', compact('trash'));
    }
    
    public function restore($id){
        $blogInTrash = Blog::onlyTrashed()->where('id', $id)->first();
        if($blogInTrash) {
            $blogInTrash->restore();
        }
        return redirect(route('blog.sampah'));
    }
    public function permanentdelete($id){
        $blogInTrash = Blog::onlyTrashed()->where('id', $id)->first();
        if($blogInTrash) {
            $blogInTrash->forceDelete();
        }
        return redirect(route('blog.sampah'));
    }
}
