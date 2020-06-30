<?php


namespace App\Comment;


interface CommentableAliasInterface
{

    public function getAlias(): string;

    public function getModelClass(): string;
}
