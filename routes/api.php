<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/post', PostController::class);
Route::resource('/user', UserController::class);

Route::get('/get-user', function(Request $request){
    $Users = UserResource::collection(User::all());
    return response()->json(['data'=> $Users,'massage' => 'Request is successfully'], 200);
});

Route::post('/create-user', function (Request $request){
    $request->validate([
        'name'=> 'sometimes|required|string|max:255',
        'email'=> 'sometimes|required|string',
        'password'=> 'sometimes|required|string',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);
    return new UserResource($user);
});

Route::post('/login', function (Request $request){
    $request->validate([
        'email'=> 'sometimes|required|string',
        'password'=> 'sometimes|required|string',
    ]);

    $credentials = request(['email', 'password']);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('MyApp')->plainTextToken;
        return response()->json(['token'=> $token,'massage' => 'login is successfully'], 200);
    } else {
        return response()->json(['error'=>'Unauthorised'], 400);
    }
});

Route::middleware('auth:sanctum')->post('/logout', function(Request $request){
    $request->user()->tokens()->delete();
    auth()->guard('web')->logout();
    return response()->json(['logout'=>$request->user(),'message' => 'Successfully log out user.']);
});


