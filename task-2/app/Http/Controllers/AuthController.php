<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function unverified(){
        return "User Not Loged in";
    }
    public function register(Request $request){
        $existingUser = User::where('email', $request->input('email'))->first();

    if ($existingUser) {
        return response()->json(['error' => 'The email address is already taken.'], 422);
    } else{
        $user= User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'status'=>$request->input('status'),
            'approval' => $request->input('approval', 'unapproved'),
        ]);
        return $user;
    }
    }
    public function login(Request $request)
{
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response([
            'message' => 'Invalid User'
        ], Response::HTTP_UNAUTHORIZED);
    }

    $user = Auth::user();

    $token = $user->createToken('token')->plainTextToken;

    $cookie = cookie('jwt', $token, 60 * 24); 

    return response([
        'message' => 'success'
    ])->withCookie($cookie); 
}
public function user()
{
    if (!Auth::check()) {
        return response()->json([
            'message' => 'You are not authenticated. Please log in to access this resource.'
        ], 401);
    }

    return Auth::user();
}



public function logout(){
    $cookie= Cookie::forget('jwt');
    return response([
        'message'=>'logout'
    ])->withCookie($cookie);
}
}
