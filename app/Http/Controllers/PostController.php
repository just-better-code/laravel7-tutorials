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
        return $this->getModelClass()::all();
    }

    public function store(Request $request)
    { /** Имеет экземпляр модели */ }

    public function show(Post $post)
    {
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $post->fill($request->all())->saveOrFail();

        return $post->refresh();
    }

    public function destroy(Post $post)
    { /** Имеет экземпляр модели */ }

    public function import()
    { /** Не имеет экземпляра модели */ }

    public function export(Post $post)
    { /** Имеет экземпляр модели */ }
}
