<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::guessPolicyNamesUsing(function ($class) {
            return str_replace("\\Models\\", "\\Policies\\" , $class) .'Policy';
        });
    }
}
