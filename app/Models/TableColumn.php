<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TableColumn extends Model
{
    use HasFactory;
    protected $table = "TableColumn";
    public function getColumnID($id_course){
        return DB::table($this->table)->where('id_course', $id_course)->get();
    }

    //get Detail column.
    public function getDetailColumn($id_column){
        return DB::table($this->table)->where('id', $id_column)->get();

    }


    public function addNewColumn($id_course, $name){
        DB::table($this->table)->insert([
           "name" => $name,
            "id_course" => $id_course
        ]);
    }
}
