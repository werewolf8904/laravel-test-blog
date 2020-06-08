<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    $class=$faker->randomElement([\App\Post::class,\App\PostsCategory::class]);
    return [
        'author'=>$faker->sentence(2),
        'content'=>$faker->paragraph,
        'belong_to_type'=>$class,
        'belong_to_id'=>factory($class)->create()->id
    ];
});
