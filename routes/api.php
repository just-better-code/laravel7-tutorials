<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['auth:api']],
    static function () {
        Route::post('posts/import', PostController::class.'@import')->name('posts.import');
        Route::get('posts/{post}/export', PostController::class.'@export')->name('posts.export');
        Route::apiResource('posts', PostController::class);
    }
);

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'auth'
    ],
    function ($router) {
        Route::post('login', AuthController::class.'@login');
        Route::post('logout', AuthController::class.'@logout');
        Route::post('refresh', AuthController::class.'@refresh');
        Route::post('me', AuthController::class.'@me');
    }
);
