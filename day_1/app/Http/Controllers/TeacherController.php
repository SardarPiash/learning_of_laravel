<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TeacherController extends Controller
{
    public function viewForm(){
        return view ('pages.teacher.teacherForm');
    }
    public function submitForm(Request $request){
        $rules=[
            "name"=>'required|string',
            "id"=>'required|numeric',
            "dept"=>'required|string'
           ];
           $messages=[
            "required.name"=>"Enter The full Name!",
            "required.id"=>"Enter your student Id!"
           ];
            $validator= Validator::make($request->all(),$rules,$messages);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $teacher= new Teacher();
            $teacher->name=$request->name;
            $teacher->id=$request->id;
            $teacher->dept=$request->dept;
            $teacher->save();
            
            return view('pages.teacher.teacherinfo')
            ->with('name', $request->name)
            ->with('id', $request->id)
            ->with('dept', $request->dept);
    }
}
