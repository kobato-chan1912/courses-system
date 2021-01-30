<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function course(){
        $course = new courses();
        $data = $course->getAll();
        return view("Admin.Pages.courses.course", ["data" => $data]);
    }
    public function addCourse (Request $request){

        //Define model.
        $courses = new courses();


        $validate = ["png", "jpg", "jpeg"];
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
            $lasted_course = $courses->getLast()->id;

            // Get the next ID.
            $new_id = $lasted_course+1;
            $new_format_id = sprintf("%02d", $new_id);
            // create a folder in public with format ID.
            mkdir("courses/$new_format_id", 0700);
            // upload Image with preview.name to folder.
            $filename = "preview_$new_format_id" . "." . $extension;
            $file->move("courses/$new_format_id", $filename);

            $image = "courses/$new_format_id/". $filename;

            // send to DB.
            $courses->addCourse($new_id, $request->name_course, $request->categories, $new_format_id, $image, $request->price, $request->description);

            //return.

            return redirect()->route("adminCourse");


            }
        else {
            //code here
            return view("Admin.Pages.courses.addcourse", ["fileValidate" => "Sai định dạng file."]);
        }

    }

}
