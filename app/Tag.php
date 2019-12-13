<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Tag extends Model
{
    //
    protected $fillable = ['name','slug'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

     /**
     * Get the tag slug.
     *
     * @param  string  $value
     * @return string
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
