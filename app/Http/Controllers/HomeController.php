<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function getHome(){ //define Homepage.
        // define model.
        $course = new courses();
//        var_dump($course->getAll());
        return view('pages.home', ["courses" => $course->getAll()]);

    }
}
