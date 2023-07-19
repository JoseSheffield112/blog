<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

/*
 * Debugging for SQL queries
 *
 *     \Illuminate\Support\Facades\DB::listen(function ($query){
 *       logger($query ->sql, $query->bindings);
 *   });
 *
 */

Route::get('/', [PostController::class, 'index'])->name('home');

// using route model binding to get post
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts(),
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts(),
        'categories' => Category::all()
    ]);
});

//Route::get('/categories/{category:slug}', function (Category $category) {
//    return view('categories', [
//        'posts' => $category->posts()->with(['author', 'category'])->latest()->get()
//    ]);
//});
//
//Route::get('authors/{author:username}', function (User $author) {
//    return view('author', [
//        'posts' => $author->posts()->with(['author', 'category'])->latest()->get()
//    ]);
//});

