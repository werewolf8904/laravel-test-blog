<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentController extends Controller
{

    /**
     * @param  CommentRequest  $request
     * @param $type
     * @param $id
     * @param  CommentRepositoryInterface  $commentRepository
     * @return Comment
     */
    public function add(CommentRequest $request, $type, $id, CommentRepositoryInterface $commentRepository)
    {

        return $commentRepository->add($request->all(), $type, $id);

    }
}
