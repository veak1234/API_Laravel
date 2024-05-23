<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\User;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the resource of data
        $Users = UserResource::collection(User::all());
        return response()->json(['data'=> $Users,'massage' => 'Request is successfully'], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // create a new resource
        $users = User::create($request->validated());
        return new UserResource($users);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // 
        // return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string|int $id)
    {
        //
        $users = User::find($id);
        $users->update($request->validated());
        return new UserResource($users);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRequest $post, string|int $id)
    {
        //
        $users = User::find($id);
        $users->delete();
        return new UserResource($users);
        // $post = Post::find($id);
        // $post->delete();
        // return new PostResource($post);
    }
}

