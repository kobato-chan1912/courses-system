<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function course(){
        $course = new courses();
        $data = $course->getAll();
        return view("Admin.Pages.courses.course", ["data" => $data]);
    }
    public function addCourse (Request $request){
        $validate = ["png"];
        $request->validate([

           "name_course" => 'required',
            "cover_img" => 'required',
            'categories' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        //image validate.
        $file = $request->file('cover_img'); //get the file.

        $extension = $file->getClientOriginalExtension();

        // if extension is done.
        if (in_array($extension, $validate)) {
            // code here



            }
        else {
            //code here
            return view("Admin.Pages.courses.addcourse", ["fileValidate" => "Sai định dạng file."]);
        }

    }

}
