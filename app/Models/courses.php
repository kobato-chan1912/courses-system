<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class courses extends Model
{
    use HasFactory;
    protected $table = "courses";
    public $timestamps = true;

    // all

    public function getAll(){
        return DB::table($this->table)->select("courses.*","name_catgories")->join("categories", "categories.id", "=", "courses.categories_id")->get();
    }
    public function getCourseDetail ($id){
        return DB::table($this->table)->where("id", $id)->get();
    }
    public function getLast(){
        return DB::table($this->table)->latest("id")->first();
    }
    public function addCourse($id, $name_course, $categories, $format_id, $img_url, $price, $description){
        DB::table($this->table)->insert([
           [
                "id" => $id,
               'price' => $price,
               "name_course" => $name_course,
               "categories_id" => $categories,
               "format_id" => $format_id,
               "description" => $description,
               "image" => $img_url,
               "count" => 0,
               "learners" => 0,
               "duration" => "00:00",
               "rate" => 0

           ]
        ]);
    }


}
