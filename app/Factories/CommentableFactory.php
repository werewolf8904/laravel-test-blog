<?php


namespace App\Factories;


use App\Post;
use App\PostsCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class CommentableFactory
{
    public const COMMENT_TYPE_POST = 'post';

    public const COMMENT_TYPE_POSTS_CATEGORY = 'category';

    /**
     * @param $type
     * @param $id
     * @return Post|Post[]|PostsCategory|PostsCategory[]
     */
    public function build($type, $id)
    {
        switch ($type) {
            case self::COMMENT_TYPE_POSTS_CATEGORY:
                return PostsCategory::findOrFail($id);
            case self::COMMENT_TYPE_POST:
                return Post::findOrFail($id);
            default:
                throw new ModelNotFoundException('Unable to find model to comment.');
        }
    }
}
