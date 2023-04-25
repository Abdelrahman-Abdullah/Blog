<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
// Controller Just Has One Method and do One Thing
Route::post('newsletter' , NewsletterController::class);

// Anyone can reach
Route::get('/', [PostController::class , 'index'])->name('home');
Route::get('/posts/{post:title}', [PostController::class , 'show']);

// Only the users who don't Log in can reach this route [Gust Users]
Route::middleware('guest')->group(function (){
    Route::get( 'register' , [RegisterController::class , 'create']);
    Route::post('register' , [RegisterController::class , 'store']);
    Route::get( 'login' ,    [SessionController::class ,  'create']);
    Route::post('login' ,    [SessionController::class ,  'store']);
});

//Routes Should be Logged in to reach
Route::middleware('auth')->group(function (){
    Route::post('posts/{post:title}/comments' , [PostCommentController::class , 'store']);
    Route::post('logout' , [SessionController::class , 'destroy']);
});

