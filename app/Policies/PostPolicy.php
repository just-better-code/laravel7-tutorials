<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class PostPolicy extends ModelPolicy
{
    protected function getModelClass(): string
    {
        return Post::class;
    }

    public function import(User $user)
    {
        return $user->can('import-' . $this->getModelClass());
    }

    public function export(User $user, Model $model)
    {
        return $user->can('export-' . $this->getModelClass());
    }
}
