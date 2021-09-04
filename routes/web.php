<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;


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

Route::post('/newsletter', function (Newsletter $newsletter) {
    request()->validate([
        'email' => 'required|email'
    ]);

    try {
        // $newsletter = new Newsletter();
        // $newsletter->subscribe(request('email'));

        $newsletter->subscribe(request('email'));
    } catch (Exception $e) {
        throw ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }


    return redirect('/posts')->with('success', 'You are now signed up for our newsletter!');
});


Route::get('/welcome', function () {
    return view('welcome',  ['user' => 'hui']);
});

Route::get('/about', function () {
    return view('about',  ['name' => 'Huihui']);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentController::class, 'store']);


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy']);

// Route::get('/posts/{post}', function ($id) {
//     // Find a post by its slug and pass it to a view called "post"
//     return view('post', [
//         'post' => Post::findOrFail($id)
//     ]);
// });
// ->where('post', '[A-z_\-]+');


Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts.index', [
        'posts' => $category->posts,
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts,
    ]);
});
