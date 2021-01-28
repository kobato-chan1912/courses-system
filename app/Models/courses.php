<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class courses extends Model
{
    use HasFactory;
    protected $table = "courses";
    public $timestamps = false;

    // all

    public function getAll(){
        return DB::table($this->table)->join("categories", "categories.id", "=", "courses.categories_id")->get();
    }


}
