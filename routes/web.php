<?php

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

//HOMEPAGE
Route::get('/', function (){
    return view('home');
})->name('home');

//AUTH
Route::get('/login' , [\App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login');
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::post('/login' ,[\App\Http\Controllers\Auth\LoginController::class, 'store']);
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);
Route::post('/logout',[\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//USERS
Route::get('/user/{user}', [\App\Http\Controllers\Account\AccountController::class, 'index'])->name('user');
Route::post('/edit-profile-picture/{user}',[\App\Http\Controllers\Account\ProfilePictureController::class,'update'])->name('edit-profile-picture');
Route::delete('/user/{user}/delete', [\App\Http\Controllers\Account\UsersController::class, 'destroy'])->name('delete-user');

//ALL USERS
Route::get('/users', [\App\Http\Controllers\Account\UsersController::class, 'index'])->name('all-users');

//POSTS
Route::get('/posts', [\App\Http\Controllers\Post\PostController::class, 'index'])->name('posts');
Route::post('/create-post',[\App\Http\Controllers\Post\PostController::class,'store'])->name('create-post');
Route::delete('/posts/{post}/delete', [\App\Http\Controllers\Post\PostController::class, 'destroy'])->name('delete-post');
Route::get('/post/{post}/edit', [\App\Http\Controllers\Post\PostController::class, 'edit'])->name('edit-post');
Route::post('/post/{post}/update', [\App\Http\Controllers\Post\PostController::class, 'update'])->name('update-post');

//CONTACT
Route::get('/contact', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contact');
Route::post('/contact/{user}/send', [\App\Http\Controllers\Admin\ContactController::class, 'store'])->name('send-message');
Route::delete('/contact/{message}/delete', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('delete-message');

//LIKES
Route::post('/posts/{post}/like', [\App\Http\Controllers\Post\LikeController::class, 'store'])->name('like-post');
Route::delete('/posts/{post}/like', [\App\Http\Controllers\Post\LikeController::class, 'destroy']);

//ADMIN PANEL
Route::get('/admin', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

