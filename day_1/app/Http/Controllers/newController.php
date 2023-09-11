<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class newController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function service(){
        $name= "Mr. Piash";
        $email= "piash@gmial.com";
        $occupation= "Student";
        $services=array("Car Paint","Home lone","Air ticket Booking","Travel");
        return view('service')
        ->with('name',$name)
        ->with('email',$email)
        ->with('occupation',$occupation)
        ->with('services',$services);
    }
    public function aboutUs(){
        return view ('aboutUs');
    }
    public function ourTeam(){
        $employee=array("Mr. X", "Mr. Y","Mr. Z");
        return view ('ourTeam')
        ->with('employee',$employee);
    }
    public function contactUs(){
        return view ('contactUs');
    }
    
}
