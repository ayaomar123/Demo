<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name','email','password','image','phone','permissions' ,'slug'];


  /*   public function setPermissionsAttribute($value)
    {
        $this->attributes['permissions'] = json_encode($value);
    }


    public function getPermissionsAttribute($value)
    {
        return $this->attributes['permissions'] = json_decode($value);
    }
    */

}

