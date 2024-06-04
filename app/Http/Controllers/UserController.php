<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        //
        $users = User::all();
        return UserResource::collection($users);
    }

    public function store(Request $request)
    {
        //
        $user = User::create($request->all());
        $user =  new UserResource($user);
        return response()->json(['massage' => 'You are create user successfully'], 200);
    }

    public function show($id){
        //
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user, string|int $id)
    {
        //
        $user = User::find($id);
        $user->update($request->validated());
        $user = new UserResource($user);
        return response()->json(['massage' => 'You are update successfully'], 200);
    }


    public function destroy(string|int $id){
        //
        $user = User::find($id);
        $user->delete();
        $user = new UserResource($user);
        return response()->json(['massage' => 'You are delete successfully'], 200);
    }
}
