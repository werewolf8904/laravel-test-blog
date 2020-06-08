<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'id'=>1,
                'name'=>'Post 1',
                'content'=>'1',
                'posts_category_id'=>1,
                'file'=>''
            ],
            [
                'id'=>2,
                'name'=>'Post 2',
                'content'=>'2',
                'posts_category_id'=>1,
                'file'=>''
            ],
            [
                'id'=>3,
                'name'=>'Post 3',
                'content'=>'3',
                'posts_category_id'=>2,
                'file'=>''
            ],
            [
                'id'=>4,
                'name'=>'Post 4',
                'content'=>'4',
                'posts_category_id'=>2,
                'file'=>''
            ]
        ];

        \App\Post::insert($data);
    }
}
