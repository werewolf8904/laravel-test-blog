<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsCategory extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'belong_to');
    }
}
