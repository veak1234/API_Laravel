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
        $post = Posts::findOrFail($posts);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Posts $posts, string|int $id)
    {
        //
        $post = Posts::find($id);
        $post->update($request->validated());
        $post = new PostResource($post);
        return response()->json(['massage' => 'You are update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts, string|int $id)
    {
        //
        $post = Posts::find($id);
        $post->delete();
        $post = new PostResource($post);
        return response()->json(['massage' => 'You are delete successfully'], 200);
    }
}
