<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SystemController extends Controller
{
    public function registrationForm()
    {
        return view('role.system.registration');
    }

    public function registrationFormSubmission(Request $request)
    {
        $rule = [
            "name" => "required|string",
            "email" => "required",
            "password" => "required",
            "status" => "required"
        ];
        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $system = new System();
            $system->name = $request->name;
            $system->email = $request->email;
           // $system->password = $request->password;
            $system->password=Hash::make($request->password);
            $system->status = $request->status;
            $system->approval = "notapproved";
            $system->save();
            return redirect()->route('loginForm');
        }
    }
    public function loginForm()
    {
        return view('role.system.login');
    }

    public function loginFormSubmission(Request $request)
    {
        $rule = [
            "email" => "required",
            "password" => "required",
        ];

        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->password;
            $system = System::where('email', $email)->select('email', 'password', 'status', 'approval')->first();

            if ($system) {
                $dbEmail = $system->email;
                $dbPassword = $system->password;
                $dbStatus = $system->status;
                $dbApproval = $system->approval;

                if (Hash::check($request->input('password'), $dbPassword)) {
                    if($dbStatus ==="admin"){
                        if($dbApproval ==="approved"){
                            return redirect()->route('viewAdminDashboard')
                            ->with ('email',$dbEmail);
                        }else{
                            return redirect()->route('loginForm')->withErrors(['logerror' => 'Needs to approved by an Admin']);
                        }
                    } else if($dbStatus ==="user") {
                        return redirect()->route('viewUserDashboard')
                        ->with('email',$dbEmail);
                    }
                } else {
                    return redirect()->route('loginForm')->withErrors(['logerror' => 'Password Invalid']);
                }
            } else {
                return redirect()->route('loginForm')->withErrors(['logerror' => 'User Invalid']);
            }
        }
    }
}
