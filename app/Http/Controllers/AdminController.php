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

}
