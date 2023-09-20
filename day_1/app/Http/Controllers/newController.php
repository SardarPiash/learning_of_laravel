<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


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

    public function viewForm(){
        return view ('pages.studentForm.studentForm');
    }
    public function output(Request $request){
       $rules=[
        "name"=>'required|string',
        "id"=>'required|numeric',
        "dept"=>'required|string'
       ];
       $messages=[
        "required.name"=>"Enter The full Name!",
        "required.id"=>"Enter your student Id!"
       ];
       
        $this->validate($request,$rules,$messages);
        $student= new Student();
        $student->name = $request->name;
        $student->id = $request->id;
        $student->dept= $request->dept;
        $student->save();

        return view ('pages.studentForm.studentinfo')
        ->with('name',$request->name)
        ->with('id',$request->id)
        ->with('dept',$request->dept);
    }
    

    
}
