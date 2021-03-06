<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title', 'link','status'];

    public function Article()
    {
        return $this->belongsTo(Articles::class);
    }

}
