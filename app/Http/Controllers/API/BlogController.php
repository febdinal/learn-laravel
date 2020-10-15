<?php

namespace App\Http\Controllers\API;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogCollection;
use App\Http\Requests\StoreBlog as BlogRequest;
use App\Http\Requests\UpdateBlog as UpdateRequest;

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
            'title'         => $request->title,
            'body'          => $request->body,
            'user_id'       => $request->user_id,
            'category_id'   => $request->category_id,
        ]);
        if($blog) {
            return response()->json([
                'message' => 'Post has been created successful!'
            ], 200);
        }
        return response()->json([
            'message' => 'Ca\'t create blog post!'
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
     * @param  App\Http\Requests\UpdateBlog  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id) {
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title'         => $request->title,
            'body'          => $request->body,
            'user_id'       => $blog->user_id,
            'category_id'   => $blog->category_id,
        ]);
        if($blog) {
            return response()->json([
                'message' => 'Post has been updated!'
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Blog::findOrFail($id)->Delete();
        return response()->json([
            'message' => 'Post move to trash.'
        ]);
    }

    public function trash() {
        $trash = Blog::onlyTrashed()->get();
        return response()->json($trash);
    }
    
    public function restore($id) {
        $blogInTrash = Blog::onlyTrashed()->where('id', $id)->first();
        if($blogInTrash) {
            $blogInTrash->restore();
        }
        return response()->json([
            'message' => 'Post has been restored!'
        ]);
    }
    public function forceDelete($id) {
        $blogInTrash = Blog::onlyTrashed()->where('id', $id)->first();
        if($blogInTrash) {
            $blogInTrash->forceDelete();
        }
        return response()->json([
            'message' => 'Post has been deleted permanent!'
        ]);
    }
}
