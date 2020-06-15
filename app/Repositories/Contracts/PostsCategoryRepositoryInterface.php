<?php

namespace App\Repositories\Contracts;

use App\PostsCategory;

/***
 * Interface PostsCategoryRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface PostsCategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllPaginated();

    /**
     * @return PostsCategory
     */
    public function new(): PostsCategory;

    /**
     * @param  array  $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param  PostsCategory  $postsCategory
     * @param  array  $data
     * @return mixed
     */
    public function update(PostsCategory $postsCategory, array $data);

    /**
     * @param  PostsCategory  $postsCategory
     * @return mixed
     */
    public function delete(PostsCategory $postsCategory);
}
