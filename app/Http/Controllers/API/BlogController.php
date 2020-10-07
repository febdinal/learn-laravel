<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $blog = Blog::all();
        // dd($blog);
        return response()->json($blog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required'
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
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);
        if($blog) {
            return response()->json([
                'status' => 'berhasi'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findorFail($id);
        return response()->json([
            'title' => $blog->title,
            'body' => $blog->body,
            'user' => $blog->user->name,
            'category' => $blog->category->name,
            'Foo' => 'testetsetset'
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
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
    public function destroy($id)
    {
        Blog::findOrFail($id)->forceDelete();
        return response()->json([
            'status' => 'Berhasil Di Hapus'
        ]);
    }
}
