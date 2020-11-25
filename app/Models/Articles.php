<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Articles extends Model
{
    protected $fillable = ['category_id','title','slug','description','status','image'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }
}
