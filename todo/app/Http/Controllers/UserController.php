<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use App\Models\Todo;

class UserController extends Controller
{
    public function viewUserDashboard(Request $request){
        $email=$request->session()->get('email');
        $system=System::where('email',$email)->select('name','email','status')->first();
        if($system){
            $dbName = $system->name;
            $dbEmail = $system->email;
            $dbStatus = $system->status;
            return view('role.user.dashboard',[
                'name'=>$dbName,
                'email'=>$dbEmail,
                'status'=>$dbStatus
            ]);
        }
    }
    public function seetodolist(Request $request){
        $email = $request->session()->get('email');
        $todos = Todo::where('email', $email)->select('name', 'todo', 'date')->get();
    
        $list = [];
        $name=$todos->name;
        foreach ($todos as $todo) {
            $list[] = [
                'name' => $todo->name,
                'todo' => $todo->todo,
                'date' => $todo->date,
            ];
        }
    
        return view('role.user.todoList', [
            'name' => $name,
            'email' => $email,
            'list' => $list,
        ]);
    }
    
}
