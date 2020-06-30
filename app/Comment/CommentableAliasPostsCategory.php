<?php


namespace App\Comment;


use App\PostsCategory;

class CommentableAliasPostsCategory implements CommentableAliasInterface
{

    public function getAlias(): string
    {
        return 'category';
    }

    public function getModelClass(): string
    {
        return PostsCategory::class;
    }
}
