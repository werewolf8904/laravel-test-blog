<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $posts = Post::paginate();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $post = new Post();
        return view('post.form', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest  $request
     */
    public function store(PostRequest $request)
    {
        $post = new Post($request->all());
        $this->loadFileFromRequest($request, $post);
        $post->save();

        return redirect()->route('post.index');
    }

    protected function loadFileFromRequest(PostRequest $request, Post $post)
    {
        $file = $request->file('file');
        if ($file) {
            $path = $file->storeAs('public/postsfiles/'.$post->id, $file->getClientOriginalName());
            $post->file = $path;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->orderBy('created_at', 'desc')->paginate();
        return view('post.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     */
    public function edit(Post $post)
    {
        return view('post.form', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest  $request
     * @param  \App\Post  $post
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->fill($request->all());

        $this->loadFileFromRequest($request, $post);

        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
