<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;
use App\Http\Resources\LikeResource;


class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $like = Like::all();
        return LikeResource::collection($like);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LikeRequest $request)
    {
        //
        $like = Like::create($request->all());
        $like =  new LikeResource($like);
        return response()->json(['data'=> $like,'massage' => 'User likes successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(like $like)
    {
        //
    }
}
