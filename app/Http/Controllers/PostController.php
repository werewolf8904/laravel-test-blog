<?php

namespace App\Http\Controllers;

use App\Factories\CommentableFactory;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  PostRepositoryInterface  $postRepository
     * @return View
     */
    public function index(PostRepositoryInterface $postRepository)
    {

        $posts = $postRepository->getAllPaginated();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  PostRepositoryInterface  $postRepository
     * @return View
     */
    public function create(PostRepositoryInterface $postRepository)
    {
        $post = $postRepository->new();
        return view('post.form', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest  $request
     * @param  PostRepositoryInterface  $postRepository
     * @return RedirectResponse
     */
    public function store(PostRequest $request, PostRepositoryInterface $postRepository)
    {
        $postRepository->create($request->all(), $request->file('file'));

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @param  CommentRepositoryInterface  $commentRepository
     * @param  CommentableFactory  $commentableFactory
     * @return View
     */
    public function show(
        Post $post,
        CommentRepositoryInterface $commentRepository,
        CommentableFactory $commentableFactory
    ) {
        $comments = $commentRepository->getForPost($post);
        $commentableAlias = $commentableFactory->getAliasByModelClass(get_class($post));
        $commentLink = route('add-comment', [$commentableAlias->getAlias(), $post->id]);
        return view('post.show', compact('post', 'comments', 'commentLink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return View
     */
    public function edit(Post $post)
    {
        return view('post.form', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest  $request
     * @param  Post  $post
     * @param  PostRepositoryInterface  $postRepository
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post, PostRepositoryInterface $postRepository)
    {
        $postRepository->update($post, $request->all(), $request->file('file'));

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @param  PostRepositoryInterface  $postRepository
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post, PostRepositoryInterface $postRepository)
    {
        $postRepository->delete($post);
        return back();
    }
}
