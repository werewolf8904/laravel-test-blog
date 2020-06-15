<?php

namespace App\Providers;

use App\Glide\Glide;
use App\Repositories\CommentRepository;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Contracts\PostsCategoryRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\PostsCategoryRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $singletons = [
        PostsCategoryRepositoryInterface::class => PostsCategoryRepository::class,
        PostRepositoryInterface::class => PostRepository::class,
        CommentRepositoryInterface::class => CommentRepository::class
    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            PostsCategoryRepositoryInterface::class,
            PostRepositoryInterface::class,
            CommentRepositoryInterface::class
        ];
    }
}
