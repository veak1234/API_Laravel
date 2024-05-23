<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\Postresource;
use App\Http\Requests\PostRequest;
// use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the resource of data
        return Postresource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // create a new resource
        $post = Post::create($request->validated());
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // 
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string|int $id)
    {
        //
        $post = Post::find($id);
        $post->update($request->validated());
        return new PostResource($post);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostRequest $post, string|int $id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        return new PostResource($post);
    }
}
