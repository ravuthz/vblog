<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\User;
use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostControllerTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseMigrations;
    
    protected function createPost($number = 1) {
        $user = factory(User::class, 3)->create();
        return factory(Post::class, $number)->create();
    }
    
    public function test_list_all_posts() {
        $posts = $this->createPost(5);
    
        $this
            ->get('admin/post')
            ->assertResponseStatus(200)
            ->assertViewHas('posts');
    }
    
    public function test_show_one_post() {
        $post = $this->createPosts();
        
        $this
            ->get('admin/post/' . $post->id)
            ->assertResponseStatus(200)
            ->assertViewHas('post');
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
