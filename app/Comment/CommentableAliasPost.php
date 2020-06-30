<?php


namespace App\Comment;


use App\Post;

class CommentableAliasPost implements CommentableAliasInterface
{

    public function getAlias(): string
    {
        return 'post';
    }

    public function getModelClass(): string
    {
        return Post::class;
    }
}
