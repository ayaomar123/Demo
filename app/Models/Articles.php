<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Articles extends Model
{
    protected $fillable = ['title','slug','name','description','status','image'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function setSlugAttribute($slug)
    {
        if (empty($slug)) {
            $slug = $this->attributes['title'] . ' ' . Str::random(10);
        }

        $this->attributes['slug'] = Str::slug($slug, '-');
    }
}
