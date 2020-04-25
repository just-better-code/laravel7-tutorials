<?php

namespace App\Models;

use App\Extensions\Traits\GuardedModel;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use GuardedModel;

    protected function authView(): array
    {
        return [
            'author',
        ];
    }

    protected function authUpdate(): array
    {
        return [
            'created_at',
        ];
    }
}
