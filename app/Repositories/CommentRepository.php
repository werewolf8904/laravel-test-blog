<?php


namespace App\Repositories;


use App\Comment;
use App\Post;
use App\PostsCategory;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Database\Eloquent\Relations\MorphMany;


final class CommentRepository implements CommentRepositoryInterface
{

    public const COMMENT_TYPE_POST = 'post';

    public const COMMENT_TYPE_POSTS_CATEGORY = 'category';

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
     * @param $type
     * @param $id
     * @return Comment
     */
    public function add(array $data, $type, $id): Comment
    {
        switch ($type) {
            case self::COMMENT_TYPE_POSTS_CATEGORY:
                $model = PostsCategory::findOrFail($id);
                break;
            case self::COMMENT_TYPE_POST:
            default:
                $model = Post::findOrFail($id);
                break;
        }
        $comment = new Comment($data);
        /**
         * @var PostsCategory|Post $model
         */
        $model->comments()->save($comment);

        return $comment;
    }
}
