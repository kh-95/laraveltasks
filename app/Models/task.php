<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;



    protected $table="tasks";

    public $timestamps=false;

    protected $fillable=["title","description","start_date","end_date","user_id"];
}
