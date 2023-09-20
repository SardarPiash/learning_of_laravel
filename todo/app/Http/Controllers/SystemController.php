<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SystemController extends Controller
{
    public function registrationForm(){
        return view ('role.system.registration');
    }

    public function registrationFormSubmission(Request $request){
        $rule=[
            "name"=>"required|string",
            "email"=>"required",
            "password"=>"required",
            "status"=>"required"
        ];
        $validator = Validator::make($request->all(),$rule);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $system = new System();
            $system->name=$request->name;
            $system->email=$request->email;
            $system->password=$request->password;
            $system->status=$request->status;
            $system->approval="notapproved";
            $system->save();
            return view ('role.system.login');
        }
    }
    public function loginForm(){
        return view ('role.system.login');
    }

    public function loginFormSubmission(Request $request){
        
    }
}
