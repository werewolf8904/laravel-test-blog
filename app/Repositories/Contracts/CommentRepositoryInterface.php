<?php

namespace App\Repositories\Contracts;

use App\Comment;
use App\Post;
use App\PostsCategory;

/**
 * Interface CommentRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface CommentRepositoryInterface
{
    /**
     * @param  Post  $post
     * @return mixed
     */
    public function getForPost(Post $post);

    /***
     * @param  PostsCategory  $postsCategory
     * @return mixed
     */
    public function getForPostsCategory(PostsCategory $postsCategory);

    /**
     * @param  array  $data
     * @param $type
     * @param $id
     * @return Comment
     */
    public function add(array $data, $type, $id): Comment;
}
