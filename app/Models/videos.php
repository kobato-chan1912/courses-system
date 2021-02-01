<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class videos extends Model
{
    use HasFactory;
    protected $table = "videos";

    public function getDetailColumnID($idColumn){
        return DB::table($this->table)->where('id_column', $idColumn)->get();
    }
    public function getLast(){
        return DB::table($this->table)->latest("id")->first();
    }
    public function videoCourse($id_course){
        return DB::table($this->table)->where("id_course", $id_course)->get();
    }
    public function getVideoDetail(){
        return DB::table($this->table)->get();
    }

    public function addVideo($id_course, $id_table, $filename, $name, $videoURL , $locked, $description, $document){
        DB::table($this->table)->insert([
           [
               "id_column" => $id_table,
               "id_course"=> $id_course,
               "file_name" => $filename,
               "name" => $name,
               "duration" => "00:00", //update later
               "video_url" => $videoURL,
               "lock_status" => $locked,
               "description" => $description,
               "document_url" => $document


           ]
        ]);
    }

}
