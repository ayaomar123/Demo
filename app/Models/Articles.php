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

//    public function setSlugAttribute($slug)
//    {
//        if (empty($slug)) {
//            $slug = $this->attributes['title'] . ' ' . Str::random(10);
//        }
//
//        $this->attributes['slug'] = Str::slug($slug, '-');
//    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
