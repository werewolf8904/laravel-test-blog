<?php


namespace App\Comment;


interface CommentableInterface
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments();
}
