<?php


namespace App\Repositories;


use App\PostsCategory;
use App\Repositories\Contracts\PostsCategoryRepositoryInterface;

/**
 * Class PostsCategoryRepository
 * @package App\Repositories
 */
final class PostsCategoryRepository implements PostsCategoryRepositoryInterface
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function getAllPaginated()
    {
        return PostsCategory::paginate();
    }

    /**
     * @param  array  $data
     * @return mixed|void
     */
    public function create(array $data)
    {
        PostsCategory::create($data);
    }

    /**
     * @param  PostsCategory  $postsCategory
     * @param  array  $data
     * @return mixed|void
     */
    public function update(PostsCategory $postsCategory, array $data)
    {
        $postsCategory->fill($data);
        $postsCategory->save();
    }

    /**
     * @param  PostsCategory  $postsCategory
     * @return mixed|void
     * @throws \Exception
     */
    public function delete(PostsCategory $postsCategory)
    {
        $postsCategory->delete();
    }

    /**
     * @return PostsCategory
     */
    public function new(): PostsCategory
    {
        return new PostsCategory();
    }
}
