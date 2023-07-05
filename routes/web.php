<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {
    // Find a post by its slug and pass that to view 'post'
    if(! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")){
        return redirect('/');
    }

    $post = cache()->remember("post{$slug}", now()->addMinutes(1), fn() => file_get_contents($path));

    return view('post',['post' => $post]);
})->where('post', '[A-z_\-]+');
