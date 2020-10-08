<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogCategory as CategoryRequest;
use App\Http\Requests\UpdateCategory as UpdateCategoryRequest;
use App\Models\BlogCategory;
use App\Http\Resources\BlogCategoryCollection;
use App\Http\Resources\BlogCategoryResource;


class BlogCategoryController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request) {
        $category = BlogCategory::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        if($category) {
            return response()->json([
                'Status' => 'Added Succesfully'
            ], 200);
        }
            return response()->json([
                'Status' => 'Added Not Succesfully'
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id) {
        $category = BlogCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);{
        if($category){
        return response()->json([
            'Status' => 'Update Berhasil'
            ] ,200);
            }
            return response()->json([
                'Status' => 'Update Gagal'
            ] ,400);
        }
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
            'Status' => 'Berhasil di dihilangkan'
        ]);
    }
}
