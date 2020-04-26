<?php

namespace App\Models;

use App\Extensions\Traits\GuardedModel;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use GuardedModel;

    protected $hidden = ['id'];

    protected $guarded = ['created_at', 'updated_at'];

    protected $fillable = ['title', 'description', 'user_id'];

    protected function authView(): array
    {
        return ['user_id', 'user'];
    }

    protected function authUpdate(): array
    {
        return ['user_id', 'user'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
