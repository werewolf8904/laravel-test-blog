<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use App\PostsCategory;

class CommentController extends Controller
{

    /**
     * @param  CommentRequest  $request
     * @param $type
     * @param $id
     * @return Comment
     */
    public function add(CommentRequest $request, $type, $id)
    {

        switch ($type) {
            case 'category':
                $model = PostsCategory::findOrFail($id);
                break;
            case 'post':
            default:
                $model = Post::findOrFail($id);
                break;
        }
        $comment = new Comment($request->all());
        /**
         * @var PostsCategory|Post $model
         */
        $model->comments()->save($comment);

        return $comment;
    }
}
