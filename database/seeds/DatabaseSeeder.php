<?php

use Illuminate\Database\Seeder;

use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
    
        Post::insert([
            [
                'id' => 1,
                'title' => 'post 1',
                'content' => 'post content 1'
            ],    
            [
                'id' => 2,
                'title' => 'post 2',
                'content' => 'post content 2'
            ],
            [
                'id' => 3,
                'title' => 'post 3',
                'content' => 'post content 3'
            ],
            [
                'id' => 4,
                'title' => 'post 4',
                'content' => 'post content 4'
            ],
            [
                'id' => 5,
                'title' => 'post 5',
                'content' => 'post content 5'
            ],
            [
                'id' => 6,
                'title' => 'post 6',
                'content' => 'post content 6'
            ],
            [
                'id' => 7,
                'title' => 'post 7',
                'content' => 'post content 7'
            ]
        ]);
        
    }
}
