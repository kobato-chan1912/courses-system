<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\TableColumn;
use App\Models\videos;
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

    public function showDetail($course_id){
        //define model.
        $course = new courses();
        $tableColumn = new TableColumn();
        $videos = new videos();

        // logic solution.
        $detail = $course->getCourseDetail($course_id); //course detail.
        $columnID = $tableColumn->getColumnID($course_id); //get column id.
        $video = $videos->videoCourse($course_id); //get video id.

        return view("Admin.Pages.courses.CourseDetail", ["courseDetail" => $detail, "tableColumn" => $columnID, "videos" => $video, "idCourse" => $course_id]);


    }
    public function getNewChapter($id_course){

        return view("Admin.Pages.courses.new_chapter", ["idCourse" => $id_course]);

    }

    // thêm chương mới.

    public function addChapter($id_course, Request $request){
        // define model.

        $tableColumn = new TableColumn();
        // validate
        $request->validate([
            'name_chapter' => 'required'
        ]);
        // add to DB
        $tableColumn->addNewColumn($id_course, $request->name_chapter);

        return redirect()->route("adminCourseDetail", $id_course);

    }

    public function getNewVideo($id_course, $id_column){

        $course = new courses();
        $tableColumn = new TableColumn();
        $videos = new videos();

        // logic solution.
        $detail = $course->getCourseDetail($id_course); //course detail.
        $columnID = $tableColumn->getDetailColumn($id_column); //get column id.

        return view("Admin.Pages.courses.new_video", ["course_name" => $detail[0]->name_course, "table_name" => $columnID[0]->name]);

    }
    public function addVideo($id_course, $id_column, Request $request){
        var_dump($request->all());
    }

}
