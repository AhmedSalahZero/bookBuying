<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'image' , 'description' , 'price'];
}
