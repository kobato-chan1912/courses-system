<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    public $timestamps = false;

    public function getAll(){
        return DB::table($this->table)->get();
    }
}
