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
}
