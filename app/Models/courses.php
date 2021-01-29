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
        return DB::table($this->table)->join("categories", "categories.id", "=", "courses.categories_id")->get();
    }
    public function getCourseDetail ($id){
        return DB::table($this->table)->where("id", $id)->get();
    }


}
