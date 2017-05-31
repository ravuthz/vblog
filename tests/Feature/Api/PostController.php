<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostController extends TestCase
{
    use WithoutMiddleware;
    use DatabaseMigrations;
    
    protected function createPosts($number = 1) {
        $user = factory(\App\User::class, 3)->create();
        return factory(\App\Post::class, $number)->create();
    }
    
    public function test_list_all_posts() {
        $posts = $this->createPosts(10);
        
        $this
            ->get('api/post')
            ->seeStatusCode(200);
            
        foreach($posts as $post) {
            $this->seeJson([
                'title' => $post->title,
                'content' => $post->content
            ]);
        }
    }
    
    public function test_show_one_post() {
        $post = $this->createPosts();
        
        $this
            ->get('api/post/' . $post->id)
            ->seeStatusCode(200)
            ->seeJson([
                'title' => $post->title,
                'content' => $post->content
            ]);
    }
    
    public function test_can_create_post() {
        $post = $this->createPost();
        $this->seeInDatabase('posts', $post);
    }
    
    public function test_can_update_post() {
        $post = $this->createPost();
        
        $post->update([
            'title' => 'post updated',
            'content' => 'post content updated'
        ]);
        
        $this->seeInDatabase('posts', $post); 
    }
    
    public function test_can_delete_post() {
        $post = $this->createPost();
        $post->delete();
        $this->seeInDatabase('posts', $post); 
    }
}
