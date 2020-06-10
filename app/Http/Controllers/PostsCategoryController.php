<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCategoryRequest;
use App\PostsCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $postsCategories = PostsCategory::paginate();

        return view('posts-category.index', compact('postsCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $postsCategory = new PostsCategory();
        return view('posts-category.form', compact('postsCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostsCategoryRequest  $request
     * @return RedirectResponse
     */
    public function store(PostsCategoryRequest $request)
    {
        PostsCategory::create($request->all());

        return redirect()->route('posts-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  PostsCategory  $postsCategory
     * @return View
     */
    public function show(PostsCategory $postsCategory)
    {
        $posts = $postsCategory->posts()->paginate();
        $comments = $postsCategory->comments()->orderBy('created_at', 'desc')->paginate();
        return view('posts-category.show', compact('postsCategory', 'posts', 'comments'));
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
     * @return RedirectResponse
     */
    public function update(PostsCategoryRequest $request, PostsCategory $postsCategory)
    {
        $postsCategory->fill($request->all());
        $postsCategory->save();

        return redirect()->route('posts-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PostsCategory  $postsCategory
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(PostsCategory $postsCategory)
    {
        $postsCategory->delete();
        return back();
    }
}
