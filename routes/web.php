<?php

use App\Http\Controllers\User\Auth\CustomAuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\ReplyController;
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

Route::match(['get', 'post'], '/login', [CustomAuthController::class, 'login'])->name('web.login');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('site.logout');

Route::match(['get', 'post'], '/register', [CustomAuthController::class, 'register'])->name('web.register');
Route::match(['get', 'post'], '/reset_pass', [CustomAuthController::class, 'resetPass'])->name('web.reset_pass');
Route::match(['get', 'post'], '/recovery_pass', [CustomAuthController::class, 'recoveryPass'])->name('web.recovery_pass');

 Route::middleware('auth:web')->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('site.home');
    Route::get('/post', [HomeController::class, 'post'])->name('site.post');
    Route::get('/post/detail/{slug}', [HomeController::class, 'post_detail'])->name('site.post.detail');
    Route::post('/like/{id}', [HomeController::class, 'like_post'])->name('site.like');
    Route::put('/comment', [HomeController::class, 'comment_store'])->name('site.comment.store');
    Route::get('/mypage/like', [HomeController::class, 'user_liked'])->name('site.user_liked');
    Route::match(['get', 'post'], '/mypage/post', [HomeController::class, 'user_posted'])->name('site.user_posted');
    Route::get('/mypage/profile', [HomeController::class, 'user_profile'])->name('site.user_profile');

});
 