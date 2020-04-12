<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api']], static function () {

    Route::post('posts/import', 'PostController@import')->name('posts.import');
    Route::get('posts/{post}/export', 'PostController@export')->name('posts.export');
    Route::apiResource('posts', 'PostController');

});