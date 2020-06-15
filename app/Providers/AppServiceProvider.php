<?php

namespace App\Providers;

use App\PostsCategory;
use App\Upload\FileUploader;
use App\Upload\FileUploaderInterface;
use App\View\Components\UsersBrowsersTotal;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        FileUploaderInterface::class => FileUploader::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('post.form', function ($view) {

            $postsCategories = PostsCategory::all();
            $categories = [];
            foreach ($postsCategories as $postsCategory) {
                $categories[$postsCategory->id] = $postsCategory->name;
            }
            $view->with(compact('categories'));
        });

        Blade::component('users-browsers-total', UsersBrowsersTotal::class);

        Blade::directive('propertyToId', function ($expression) {
            return "<?php echo str_replace(['[',']'],['_',''],$expression); ?>";
        });
        Blade::directive('propertyToLabel', function ($expression) {
            return "<?php echo Str::title(str_replace('_',' ',$expression)); ?>";
        });
    }
}
