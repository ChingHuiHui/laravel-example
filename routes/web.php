<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/welcome', function () {
    return view('welcome',  ['user' => 'hui']);
});

Route::get('/about', function () {
    return view('about',  ['name' => 'Huihui']);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Route::get('/posts/{post}', function ($id) {
//     // Find a post by its slug and pass it to a view called "post"
//     return view('post', [
//         'post' => Post::findOrFail($id)
//     ]);
// });
// ->where('post', '[A-z_\-]+');


Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
    ]);
});
