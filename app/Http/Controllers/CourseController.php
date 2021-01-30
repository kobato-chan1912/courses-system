<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\videos;
use App\Models\TableColumn;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function showCourse($id){
        //define model.
        $course = new courses();
        $tableColumn = new TableColumn();
        $videos = new videos();

        // logic solution.
        $detail = $course->getCourseDetail($id); //course detail.
        $columnID = $tableColumn->getColumnID($id); //get column id.
        $video = $videos->videoCourse($id);

        // return view.
        return view("pages.courseDetail", ["courseDetail" => $detail, "tableColumn" => $columnID, "videos" => $video]);
    }
    public function addCourse(){

    }

}
