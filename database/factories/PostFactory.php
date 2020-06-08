<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence,
        'content'=>$faker->paragraph,
        'posts_category_id'=>factory(\App\PostsCategory::class)->create()->id
    ];
});
