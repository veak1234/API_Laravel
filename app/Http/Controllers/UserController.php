<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    //
    public function index(){
        
        $users = User::all();
        $users = UserResource::collection($users);
        return response()->json(['data' => $users, 'message' =>'request is successfully']);
    }

    public function store(UserRequest $request){
        $user = User::create($request->all());
        if($user){
            return response()->json(['data' => new UserResource($user),'message' =>'Create is successfully']);
        }
    }

    public function show($id){
        $user = User::find($id);
        return response()->json(['data' => new UserResource($user),'message' =>'Show is successfully']);
    }

    public function update(UserRequest $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(['data' => new UserResource($user),'message' =>'Update is successfully']);
    }
    
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['data' => new UserResource($user),'message' =>'Delete is successfully']);
    }
}
