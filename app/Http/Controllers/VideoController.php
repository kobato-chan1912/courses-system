<?php

namespace App\Http\Controllers;

use App\Models\videos;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function getVideoPage($id){
        $videos = new videos();
        $detailVideo = $videos->getVideoDetail($id);
        return view ("pages.videos", ["detail" => $detailVideo]);
    }
}
