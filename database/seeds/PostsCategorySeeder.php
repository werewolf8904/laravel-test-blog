<?php

use Illuminate\Database\Seeder;

class PostsCategorySeeder extends Seeder
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
                'name'=>'Category 1',
                'description'=>'1'
            ],
            [
                'id'=>2,
                'name'=>'Category 2',
                'description'=>'2'
            ],
            [
                'id'=>3,
                'name'=>'Category 3',
                'description'=>'3'
            ]
        ];
        \App\PostsCategory::insert($data);
    }
}
