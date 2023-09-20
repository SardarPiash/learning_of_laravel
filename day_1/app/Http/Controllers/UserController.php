<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registration(){
        return view ('pages.User.registration');
    }
    public function registrationForm(Request $request){
        $rules=[
            "name"=>'required|string',
            "id"=>'required|numeric',
            "status"=>'required',
            "dept"=>'required|string'
           ];
           $messages=[
            "required.name"=>"Enter The full Name!",
            "required.id"=>"Enter your student Id!"
           ];
           $validator= Validator::make($request->all(),$rules,$messages);
           if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
           }
           else{
            $registration= new Registration();
            $registration->name=$request->name;
            $registration->password=$request->password;
            $registration->email=$request->email;
            $registration->status=$request->status;
            $registration->dept=$request->dept;
            $registration->save();
            return view ('pages.User.login');
           }
    }
    public function login(){
        return view ('pages.User.login');
    }

}
