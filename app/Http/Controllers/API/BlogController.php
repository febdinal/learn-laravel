<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlog as BlogRequest;
use App\Http\Requests\UpdateBlog as UpdateRequest;
use App\Models\Blog;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogCollection;


class BlogController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $blog = Blog::all();
        return new BlogCollection($blog);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  use App\Requests\StoreBlog  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request) {
        $blog = Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);
        if($blog) {
            return response()->json([
                'status' => 'Post has been created successfully !'
            ], 200);
        }
            return response()->json([
                'status' => 'gagal !'
            ], 400);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $blog = Blog::findorFail($id);
        return new BlogResource($blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id) {
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $blog->user_id,
            'category_id' => $blog->category_id,
        ]);
        if($blog) {
            return response()->json([
                'status' => 'update berhasil'
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Blog::findOrFail($id)->Delete();
        return response()->json([
            'status' => 'Berhasil Di Hapus'
        ]);
    }

    public function sampah(){
        $trash = Blog::onlyTrashed()->get();
        // dd($trash);
        return response()->json($trash);
    }
    
    public function restore($id){
        $blogInTrash = Blog::onlyTrashed()->where('id', $id)->first();
        if($blogInTrash) {
            $blogInTrash->restore();
        }
        return response()->json([
            'Status' => 'Berhasil di Restore'
        ]);
    }
    public function deletepermanent($id){
        $blogInTrash = Blog::onlyTrashed()->where('id', $id)->first();
        if($blogInTrash) {
            $blogInTrash->forceDelete();
        }
        return response()->json([
            'Status' => 'Berhasil di Hapus Permanent'
        ]);
    }
}
