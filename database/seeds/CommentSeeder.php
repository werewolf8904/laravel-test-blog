<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'author' => 'Ggg Aaa',
                'content' => 'Lorem ipsum 1',
                'belong_to_type' => 'App\PostsCategory',
                'belong_to_id' => 1,
                'created_at' => '2020-06-07 21:48:36'
            ],
            [
                'id' => 2,
                'author' => 'Ggg Aaa',
                'content' => 'Lorem ipsum 2',
                'belong_to_type' => 'App\Post',
                'belong_to_id' => 1,
                'created_at' => '2020-06-07 21:58:36'
            ],
        ];
        \App\Comment::insert($data);
    }
}
