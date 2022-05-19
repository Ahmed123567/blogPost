<?php

use App\Http\Controllers\userInterface\ProfileController;
use App\Http\Controllers\userInterface\CommentController;
use App\Http\Controllers\userInterface\MainPageController;
use App\Http\Controllers\userInterface\PostController;
use App\Http\Controllers\userInterface\ContactController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [MainPageController::class , 'index']) -> name('user.main');

Route::get('search', [MainPageController::class , 'search'])->name('user.main.search');

Route::get('premium', [MainPageController::class , 'premium'])->name('user.main.premium')->middleware('auth','hasMoney');



Route::group(['prefix' => 'post' , 'middleware' => 'auth'], function(){

    Route::get('create', [PostController::class, 'create']) ->name('user.main.post.create')->middleware('ableToPost');

    Route::get('{post_id}', [PostController::class , 'index']) -> name('user.main.post');

    Route::get('pin/{post_id}', [PostController::class , 'pin']) -> name('user.main.post.pin');

    Route::post('store', [PostController::class, 'store']) ->name('user.main.post.store')->middleware('ableToPost');


});

Route::group(['prefix' => 'profile'] , function(){

    Route::post('/image-upload' , [ProfileController::class, 'image'])->name('main.image');

    Route::get('/', [ProfileController::class , 'index'])->name('main.profile.index');

});



Route::group(['prefix' => 'comment' , 'middleware' => 'auth'] , function(){


    Route::get('edit/{comment_id}/post/{post_id}' , [CommentController::class , 'edit']) -> name('user.main.comment.edit');

    Route::get('reply/{comment_id}/post/{post_id}' , [CommentController::class , 'reply']) -> name('user.main.comment.reply');

    Route::post('reply' , [CommentController::class , 'replyStore']) -> name('user.main.comment.replyStore');

    Route::post('store' , [CommentController::class , 'commentStore']) -> name('user.main.comment');
 
    Route::post('update' , [CommentController::class , 'update']) -> name('user.main.comment.update');

 
});

Route::get('/contact-me',[ContactController::class,'contact'])-> name('user.main.contact')->middleware('ableToPost');

Route::post('/Send-Email',[ContactController::class,'sendEmail'])-> name('user.main.sendEmail')->middleware('ableToPost');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



