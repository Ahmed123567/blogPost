<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\manage\ManageCommentsController;
use App\Http\Controllers\manage\ManagePostsController;
use App\Http\Controllers\manage\ManageController;
use App\Http\Controllers\manage\ManageUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

Route::get('manager', [ManageController::class , 'index'])->name('manage.index');



// users routes

Route::group(['prefix'=> 'users'], function(){
    Route::get('/', [ManageUserController::class , 'index'])->name('manage.users.index');

    Route::get('edit/{user_id}', [ManageUserController::class, 'edit'])->name('manage.users.edit');

    Route::get('create' , [ManageUserController::class, 'create'])->name('manage.users.create');

    Route::get('{user_id}', [ManageUserController::class , 'show'])->name('manage.users.show');

    Route::get('delete/{user_id}', [ManageUserController::class, 'delete'])->name('manage.users.delete');


    Route::get('email/{user_id}', [ManageUserController::class, 'email'])->name('manage.users.email');


    Route::post('email', [ManageUserController::class, 'sendEmail'])->name('manage.users.sendEmail');

    Route::post('store', [ManageUserController::class, 'store'])->name('manage.users.store');

    Route::post('update', [ManageUserController::class, 'update'])->name('manage.users.update');


});


//comments routes

Route::group(['prefix' => 'comments'], function(){

    Route::get('/' , [ManageCommentsController::class , 'index'])->name('manage.comments.index');

    Route::get('create' , [ManageCommentsController::class , 'create'])->name('manage.comments.create');

    Route::get('edit/{comment_id}', [ManageCommentsController::class, 'edit'])->name('manage.comments.edit');


    Route::get('delete/{comment_id}', [ManageCommentsController::class, 'delete'])->name('manage.comments.delete');

    Route::post('store' ,  [ManageCommentsController::class , 'store'])->name('manage.comments.store');

    Route::post('update', [ManageCommentsController::class, 'update'])->name('manage.comments.update');

});


// posts routes

Route::group(['prefix' => 'post'], function(){

    Route::get('/' , [ManagePostsController::class , 'index'])->name('manage.post.index');

    Route::get('create' , [ManagePostsController::class , 'create'])->name('manage.post.create');

    Route::get('edit/{post_id}', [ManagePostsController::class, 'edit'])->name('manage.post.edit');

    Route::get('delete/{post_id}', [ManagePostsController::class, 'delete'])->name('manage.post.delete');

    Route::post('store' ,  [ManagePostsController::class , 'store'])->name('manage.post.store');

    Route::post('update', [ManagePostsController::class, 'update'])->name('manage.post.update');

});