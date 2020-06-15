<?php


namespace App\Repositories;


use App\Comment;
use App\Post;
use App\PostsCategory;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Database\Eloquent\Relations\MorphMany;


final class CommentRepository implements CommentRepositoryInterface
{
    /**
     * @param  Post  $post
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function getForPost(Post $post)
    {
        return $this->getCommentsFormModelInternal($post->comments());
    }

    /**
     * @param  MorphMany  $morphMany
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    protected function getCommentsFormModelInternal(MorphMany $morphMany)
    {
        return $morphMany->orderBy('created_at', 'desc')->paginate();
    }

    /**
     * @param  PostsCategory  $postsCategory
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function getForPostsCategory(PostsCategory $postsCategory)
    {
        return $this->getCommentsFormModelInternal($postsCategory->comments());
    }

    /**
     * @param  array  $data
     * @param  Post|PostsCategory  $model
     * @return Comment
     */
    public function add(array $data, $model): Comment
    {

        $comment = new Comment($data);

        $model->comments()->save($comment);

        return $comment;
    }
}
