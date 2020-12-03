<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    
    protected $fillable = ['category_id','title','slug','description','status','image'];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','category_article');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }
    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }
    // public function getImageAttribute($value)
    // {
    //     return !is_null($value) ? asset(Storage::url($value)) : '';
    // }
}
