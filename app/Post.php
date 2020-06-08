<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['name','content','file','posts_category_id'];

    public $timestamps=false;

    protected $attributes=[
        'file'=>''
    ];

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class,  'belong_to');
    }

    public function postsCategory()
    {
        return $this->belongsTo(PostsCategory::class);
    }
}
