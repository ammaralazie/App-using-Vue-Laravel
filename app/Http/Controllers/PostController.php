<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::latest()->paginate(2);
        return response()->json($post);
    } //end of index

    public function postSearch($query){
        $post = Post::where(function ($q) use($query) {
            return $q->where('title', 'like', '%' . $query . '%');
        })->get();
        // $post=$post->paginate(count($post));
        return response()->json($post);
    }//end of postSearch

    public function create()
    {
        //
    } //end of create


    public function store(Request $request)
    {
        //
    } //end of stroe

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json([
            'msg' => $post
        ]);
    } //end of store

    public function edit(Post $post)
    {
        //
    } //end of edit


    public function update(Request $request, Post $post)
    {
        //
    } //end of update

    public function destroy(Post $post)
    {
        //
    } //end of delete
}
