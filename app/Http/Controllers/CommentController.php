<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Factories\CommentableFactory;
use App\Http\Requests\CommentRequest;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentController extends Controller
{

    /**
     * @var CommentRepositoryInterface
     */
    private $commentRepository;
    /**
     * @var CommentableFactory
     */
    private $commentableFactory;

    /**
     * CommentController constructor.
     * @param  CommentRepositoryInterface  $commentRepository
     * @param  CommentableFactory  $commentableFactory
     */
    public function __construct(CommentRepositoryInterface $commentRepository, CommentableFactory $commentableFactory)
    {
        $this->commentRepository = $commentRepository;
        $this->commentableFactory = $commentableFactory;
    }

    /**
     * @param  CommentRequest  $request
     * @param $type
     * @param $id
     * @return Comment
     */
    public function __invoke(CommentRequest $request, $type, $id)
    {

        $commentableModel = $this->commentableFactory->buildByAlias($type, $id);
        return $this->commentRepository->add($request->all(), $commentableModel);

    }
}
