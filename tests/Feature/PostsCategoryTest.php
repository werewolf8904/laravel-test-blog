<?php

namespace Tests\Feature;

use App\PostsCategory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsCategoryTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    public function test_get_posts_category()
    {
        $postsCategories=factory(PostsCategory::class)->create();

        $response = $this->get('/posts-category');

        $response->assertSee($postsCategories->name);
        $response->assertStatus(200);

        $response = $this->get('/posts-category/'.$postsCategories->id);

        $response->assertSee($postsCategories->name);
        $response->assertStatus(200);

    }

    public function test_delete()
    {
        $postsCategories=factory(PostsCategory::class)->create();
        $postsCategories->delete();
        $this->assertDeleted($postsCategories);
    }
    public function test_posts_categories_page()
    {
        $postsCategories=factory(PostsCategory::class)->create();

        $response = $this->get('/posts-category/'.$postsCategories->id);
        $response->assertStatus(200);


    }
    public function test_create_posts_categories()
    {
        $postsCategories=factory(PostsCategory::class)->make();

        $this->post('/posts-category',$postsCategories->toArray())->assertRedirect('/posts-category');

        $this->assertDatabaseHas('posts_categories',$postsCategories->toArray());
    }

    public function test_update_posts_category()
    {
        $postsCategories=factory(PostsCategory::class)->create();

        $postsCategories->name.='New';
        $this->patch('/posts-category/'.$postsCategories->id,$postsCategories->toArray())->assertRedirect('/posts-category');

        $this->assertDatabaseHas('posts_categories',$postsCategories->toArray());
    }


}
