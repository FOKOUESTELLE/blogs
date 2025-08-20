<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('index');

Route::get('/categories/{category}', [PostController::class, 'postsByCategory'])->name('posts.byCategory');

Route::get('/tags/{tag}', [PostController::class, 'postsByTag'])->name('posts.byTag');


Route::get('/posts-{post:slug}', [PostController::class, 'show'])
->name('posts.show');
