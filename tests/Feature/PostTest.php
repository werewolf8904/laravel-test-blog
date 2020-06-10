<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    public function test_get_post()
    {
        $post = factory(Post::class)->create();

        $response = $this->get('/post');

        $response->assertSee($post->name);
        $response->assertStatus(200);

        $response = $this->get('/post/'.$post->id);

        $response->assertSee($post->name);
        $response->assertStatus(200);

    }

    public function test_delete()
    {
        $post = factory(Post::class)->create();
        $post->delete();
        $this->assertDeleted($post);
    }

    public function test_post_page()
    {
        $post = factory(Post::class)->create();

        $response = $this->get('/post/'.$post->id);
        $response->assertStatus(200);


    }
}
