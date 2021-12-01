<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class student extends Authenticatable
{
    use HasFactory;

    protected $table="student";

    public $timestamps=false;

    protected $fillable=["name","email","password","image"];


}
