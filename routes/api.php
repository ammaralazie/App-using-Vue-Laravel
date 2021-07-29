<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('posts/',[PostController::class,'index'])->name('post.index');
Route::get('postSearch/{query?}',[PostController::class,'postSearch'])->name('post.postSearch');
Route::get('posts/{id}',[PostController::class,'show'])->name('post.show');


//This route for User Controller
Route::group([],function () {
    Route::post('signup',[UserController::class,'signup'])->name('user.signup');
    Route::post('login',[UserController::class,'login'])->name('user.login');
});


