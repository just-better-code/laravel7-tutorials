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
    { /** Не имеет экземпляра модели */ }

    public function create()
    { /** Не имеет экземпляра модели */ }

    public function store(Request $request)
    { /** Имеет экземпляр модели */ }

    public function show(Post $post)
    { /** Имеет экземпляр модели */ }

    public function edit(Post $post)
    { /** Имеет экземпляр модели */ }

    public function update(Request $request, Post $post)
    { /** Имеет экземпляр модели */ }

    public function destroy(Post $post)
    { /** Имеет экземпляр модели */ }

    public function import()
    { /** Не имеет экземпляра модели */ }

    public function export(Post $post)
    { /** Имеет экземпляр модели */ }
}
