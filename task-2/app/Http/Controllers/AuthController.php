<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;
use Error;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

public function register(Request $request)
{
    try {
        $validatedData = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users', 
            'password' => 'required|string',
            'status' => 'required',
        ];

        $messages = [
            "required.name" => "Enter the full Name!",
            "required.email" => "Enter your email address!",
            "required.password" => "Enter a password!",
            "required.status" => "Select a status!",
            "unique.email" => "Email already exists.", 
        ];

        $validator = Validator::make($request->all(), $validatedData, $messages);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = $request->status;
            $user->approval = "unapproved";
            $user->save();
            return response()->json(['message' => 'Success'], 200);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Something went wrong.'], 500);
    }
}


    
    
// Login function
public function login(Request $request)
{
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response([
            'message' => 'Invalid User'
        ], Response::HTTP_UNAUTHORIZED);
    }

    $user = Auth::user();
    $id= $user->id;

    $token = $user->createToken('token')->plainTextToken;

    $cookie = cookie('jwt', $token, 60 * 24); 

    return response([
        'user' => $user,
        'token' => $token,
        'message' => 'success'
    ])->withCookie($cookie); 
}

public function user(Request $request)
{
    $id= $request->id;
    if (Auth::id() == $id) {
        $user = User::find($id);

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    } else {
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }
}

public function addTodo(Request $request, $userId)
{
    if (Auth::id() != $userId) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    try {
        $validatedData = [
            'todoname' => 'required|string',
            'todolist' => 'required|string', 
            'date' => 'required|string',
        ];

        $messages = [
            'required.todoname' => 'Enter the to-do Name!',
            'required.todolist' => 'Enter your to-do list!',
            'required.date' => 'Enter a date!', 
        ];

        $validator = Validator::make($request->all(), $validatedData, $messages);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }
        $todo = new Todo();
        $todo->userId = $userId;
        $todo->userName = Auth::user()->name; 
        $todo->todoname = $request->input('todoname');
        $todo->todolist = $request->input('todolist');
        $todo->date = $request->input('date');
        $todo->save();

        return response()->json(['message' => 'Successful'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Something went wrong.'], 500);
    }
}





public function seeTodo(Request $request)
{
    $id = $request->id;

    if (Auth::id() == $id) {
        try {
            $todos = Todo::where('userId', $id)->get();
            return response()->json(['todos' => $todos], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    } else {
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }
}

public function deleteTodo(Request $request,$id)
{
    $userId = $request->input('userIdid');

    if (Auth::id() == $id) {
        try {
            $todo = Todo::find($userId);

            if (!$todo) {
                return response()->json(['message' => 'Todo not found'], 404);
            }
            if ($todo->userId != $id) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            $todo->delete();

            return response()->json(['message' => 'Todo deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    } else {
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }
}



public function logout(){
    $cookie= Cookie::forget('jwt');
    return response([
        'message'=>'logout'
    ])->withCookie($cookie);
}
}
