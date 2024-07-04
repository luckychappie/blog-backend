<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    public function test_it_can_list_all_blog_posts()
    {
        // Create some blog posts
        Post::factory()->count(3)->create();

        // Make a GET request to the API endpoint
        $response = $this->getJson('/api/posts');

        // Assert the response status and structure
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'posts' => [
                         '*' => [
                             'id',
                             'user_id',
                             'title',
                             'slug',
                             'thumbnail',
                             'content',
                             'is_published',
                             'created_at',
                             'updated_at',
                         ],
                     ],
                 ]);
    }

    public function test_it_can_show_a_single_blog_post()
    {
        // Create a single blog post
        $blogPost = Post::factory()->create();

        // Make a GET request to the API endpoint for the specific post
        $response = $this->getJson("/api/posts/{$blogPost->id}");

        // Assert the response status and structure
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'post' => [
                             'id',
                             'user_id',
                             'title',
                             'slug',
                             'thumbnail',
                             'content',
                             'is_published',
                             'created_at',
                             'updated_at',
                     ],
                 ])
                 ->assertJson([
                     'post' => [
                         'id' => $blogPost->id,
                         'title' => $blogPost->title,
                         'content' => $blogPost->content,
                     ],
                 ]);
    }


}
