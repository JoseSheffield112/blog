<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('admin');

Route::get('/', [PostController::class, 'index'])->name('home');

// using route model binding to get post
Route::get('post/{post:slug}', [PostController::class, 'show']);
// posting comments
Route::post('post/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');


//signing up for a newsletter
Route::post('newsletter', NewsletterController::class);


// registration
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//login
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// making posts
Route::get('admin/posts/', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');





