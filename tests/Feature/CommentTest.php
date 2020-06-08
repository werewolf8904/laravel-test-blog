<?php

namespace Tests\Feature;

use App\Comment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    public function test_insert_comment()
    {
        $comment=factory(Comment::class)->create();

        $data=$comment->toArray();
        unset($data['created_at']);

        $this->assertDatabaseHas('comments',$data);
    }

    public function test_invalid_data_create()
    {
        $comment=factory(Comment::class)->make(['belong_to_id'=>null]);

        $this->postJson('/add-comment/post/'.$comment->belongs_to_id,$comment->toArray())->assertStatus(404);
    }


}
