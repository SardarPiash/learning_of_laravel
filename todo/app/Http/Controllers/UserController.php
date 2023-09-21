<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUserDashboard(){
        return view('role.user.dashboard');
    }
}
