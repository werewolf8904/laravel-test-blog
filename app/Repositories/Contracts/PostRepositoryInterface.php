<?php

namespace App\Repositories\Contracts;

use App\Post;
use App\PostsCategory;
use Illuminate\Http\UploadedFile;

/**
 * Interface PostRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface PostRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllPaginated();

    /**
     * @param  PostsCategory  $postsCategory
     * @return mixed
     */
    public function getAllForPostsCategoryPaginated(PostsCategory $postsCategory);

    /**
     * @return Post
     */
    public function new(): Post;

    /**
     * @param  array  $data
     * @param  UploadedFile|null  $file
     * @return mixed
     */
    public function create(array $data, ?UploadedFile $file);

    /**
     * @param  Post  $post
     * @param  array  $data
     * @param  UploadedFile|null  $file
     * @return mixed
     */
    public function update(Post $post, array $data, ?UploadedFile $file);

    /**
     * @param  Post  $post
     * @return mixed
     */
    public function delete(Post $post);
}
