<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['author','content'];

    const UPDATED_AT = null;


    public function belong_to()
    {
        return $this->morphTo();
    }

    public function getTypeForUrl()
    {
        switch ($this->belong_to_type)
        {
            case PostsCategory::class:
                return 'category';
            case Post::class:
            default:
                return 'post';
        }
    }
}
