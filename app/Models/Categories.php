<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [ 'slug', 'name','description','image','status'];
}
