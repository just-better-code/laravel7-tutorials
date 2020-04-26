<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    private $data = [];

    public function run()
    {
        factory(Post::class, 15)->create();
    }
}
