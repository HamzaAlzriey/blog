<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class postseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();
        // $post= new Post();

        // $post->title = "asdasd";
        // $post->body="asdasd";
        // $post->user_id="1";
        // $post->category_id="1";
        // $post->image="1";
        // $post->save();
        // $post->tags()->attach([1,2]);

        post::factory(50)->has(
            Tag::factory(10)
        )->create();


    }
}
