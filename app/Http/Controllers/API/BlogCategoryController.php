<?php

namespace App\Http\Controllers\API;

use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCategoryResource;
use App\Http\Resources\BlogCategoryCollection;
use App\Http\Requests\StoreBlogCategory as CategoryRequest;
use App\Http\Requests\UpdateCategory as UpdateCategoryRequest;


class BlogCategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $category = BlogCategory::all();
        return new BlogCategoryCollection($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreBlogCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request) {
        $category = BlogCategory::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        if($category) {
            return response()->json([
                'message' => 'Blog category has been created!'
            ], 200);
        }
        return response()->json([
            'message' => 'Can\'t create blog category'
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $category = BlogCategory::findOrFail($id);
        return new BlogCategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateBlogCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id) {
        $category = BlogCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        if($category) {
            return response()->json([
                'message' => 'Blog category has been updated'
            ], 200);
        }
        return response()->json([
            'message' => 'Ca\'t update blog category'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        BlogCategory::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Blog category has been deleted successful!'
        ]);
    }
}
