<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('posts/',[PostController::class,'index'])->name('post.index');
Route::get('postSearch/{query?}',[PostController::class,'postSearch'])->name('post.postSearch');
Route::get('posts/{id}',[PostController::class,'show'])->name('post.show');
