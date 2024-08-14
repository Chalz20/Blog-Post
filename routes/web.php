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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{id}', [\App\Http\Controllers\PostsController::class , 'show'])->name('post');

Route::middleware('auth')->group(function (){
    Route::get('/admin', [\App\Http\Controllers\AdminController::class , 'index'])->name('admin.index');
    Route::get('/admin/post', [\App\Http\Controllers\PostsController::class , 'index'])->name('admin.posts');
    Route::get('/admin/posts/create', [\App\Http\Controllers\PostsController::class , 'create'])->name('admin.create');
    Route::post('/admin/post/store', [\App\Http\Controllers\PostsController::class , 'store'])->name('admin.store');
    Route::get('/admin/post/{post}/edit', [\App\Http\Controllers\PostsController::class , 'edit'])->name('admin.edit');
    Route::patch('/admin/post/{post}/update', [\App\Http\Controllers\PostsController::class , 'update'])->name('admin.update');
    Route::delete('/admin/post/{post}/delete', [\App\Http\Controllers\PostsController::class , 'destroy'])->name('admin.delete');

    Route::get('admin/user/{user}/profile',[\App\Http\Controllers\UserController::class, 'show'])->name('user.profile');
    Route::put('admin/user/{user}/update',[\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
});