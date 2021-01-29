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
    public function videoCourse($id_course){
        return DB::table($this->table)->where("id_course", $id_course)->get();
    }
    public function getVideoDetail(){
        return DB::table($this->table)->get();
    }

}
