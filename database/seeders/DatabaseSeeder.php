<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $users = \App\Models\User::factory(10)->create();
         $posts = \App\Models\Post::factory(50)->make(['user_id'=>null])->each(function ($post) use($users){
             $post->user_id = $users->random()->id;
             $post->save();
         });
         Comment::factory(300)->make(['post_id'=>null,'user_id'=>null])->each(function ($comment)use($users,$posts){
             $comment->user_id = $users->random()->id;
             $comment->post_id = $posts->random()->id;
             $comment->save();
         });

    }
}
