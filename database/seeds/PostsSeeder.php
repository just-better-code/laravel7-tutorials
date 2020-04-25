<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    private $data = [];

    public function run()
    {
        /** @var Post $user */
        factory(Post::class, 10)->create();
    }
}
