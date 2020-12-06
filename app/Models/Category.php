<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 'name','description','image','status'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article','category_article');
    }
}
