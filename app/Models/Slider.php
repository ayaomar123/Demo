<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title', 'link', 'article_id','status','slug'];

    public function Article()
    {
        return $this->belongsTo('App\Article', 'article_id');
    }
}
