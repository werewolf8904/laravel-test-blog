<?php

namespace App\Http\Controllers;

use App\Factories\CommentableFactory;
use App\Http\Requests\PostsCategoryRequest;
use App\PostsCategory;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Contracts\PostsCategoryRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  PostsCategoryRepositoryInterface  $postsCategoryRepository
     * @return View
     */
    public function index(PostsCategoryRepositoryInterface $postsCategoryRepository)
    {
        $postsCategories = $postsCategoryRepository->getAllPaginated();

        return view('posts-category.index', compact('postsCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  PostsCategoryRepositoryInterface  $postsCategoryRepository
     * @return View
     */
    public function create(PostsCategoryRepositoryInterface $postsCategoryRepository)
    {
        $postsCategory = $postsCategoryRepository->new();
        return view('posts-category.form', compact('postsCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostsCategoryRequest  $request
     * @param  PostsCategoryRepositoryInterface  $postsCategoryRepository
     * @return RedirectResponse
     */
    public function store(PostsCategoryRequest $request, PostsCategoryRepositoryInterface $postsCategoryRepository)
    {
        $postsCategoryRepository->create($request->all());


        return redirect()->route('posts-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  PostsCategory  $postsCategory
     * @param  CommentRepositoryInterface  $commentRepository
     * @param  PostRepositoryInterface  $postRepository
     * @param  CommentableFactory  $commentableFactory
     * @return View
     */
    public function show(
        PostsCategory $postsCategory,
        CommentRepositoryInterface $commentRepository,
        PostRepositoryInterface $postRepository,
        CommentableFactory $commentableFactory
    ) {
        $posts = $postRepository->getAllForPostsCategoryPaginated($postsCategory);
        $comments = $commentRepository->getForPostsCategory($postsCategory);
        $commentableAlias = $commentableFactory->getAliasByModelClass(get_class($postsCategory));
        $commentLink = route('add-comment', [$commentableAlias->getAlias(), $postsCategory->id]);
        return view('posts-category.show', compact('postsCategory', 'posts', 'comments', 'commentLink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PostsCategory  $postsCategory
     * @return View
     */
    public function edit(PostsCategory $postsCategory)
    {
        return view('posts-category.form', compact('postsCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostsCategoryRequest  $request
     * @param  PostsCategory  $postsCategory
     * @param  PostsCategoryRepositoryInterface  $postsCategoryRepository
     * @return RedirectResponse
     */
    public function update(
        PostsCategoryRequest $request,
        PostsCategory $postsCategory,
        PostsCategoryRepositoryInterface $postsCategoryRepository
    ) {
        $postsCategoryRepository->update($postsCategory, $request->all());

        return redirect()->route('posts-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PostsCategory  $postsCategory
     * @param  PostsCategoryRepositoryInterface  $postsCategoryRepository
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(PostsCategory $postsCategory, PostsCategoryRepositoryInterface $postsCategoryRepository)
    {
        $postsCategoryRepository->delete($postsCategory);

        return back();
    }
}
