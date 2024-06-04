<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Resources\Postresource;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $post = Posts::all();
        $post = Postresource::collection($post);
        return response()->json(['data' => $post, 'massage' => 'required is successfully']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        //
        $post = Posts::create($request->all());
        $post =  new PostResource($post);
        return response()->json(['massage' => 'You are create user successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
