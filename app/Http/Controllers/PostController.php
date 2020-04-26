<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends ModelController
{
    /** @var  array 'method' => 'policy'*/
    protected $guardedMethods = [
        'export' => 'export',
        'import' => 'import',
    ];

    protected $methodsWithoutModels = ['import'];

    protected function getModelClass(): string
    {
        return Post::class;
    }

    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->fill($request->all())->saveOrFail();

        return $post->refresh();
    }

    public function show(Post $post)
    {
        return $post->fresh('user');
    }

    public function update(Request $request, Post $post)
    {
        $post->fill($request->all())->saveOrFail();

        return $post->fresh('user');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }

    public function import()
    { /** Не имеет экземпляра модели */ }

    public function export(Post $post)
    { /** Имеет экземпляр модели */ }
}
