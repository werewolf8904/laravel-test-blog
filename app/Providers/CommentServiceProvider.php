<?php

namespace App\Providers;

use App\Comment\CommentableAliasCollection;
use App\Comment\CommentableAliasPost;
use App\Comment\CommentableAliasPostsCategory;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CommentableAliasCollection::class, function ($app) {
            $collection = new CommentableAliasCollection();
            $collection->add(new CommentableAliasPost());
            $collection->add(new CommentableAliasPostsCategory());
            return $collection;
        });
    }


}
