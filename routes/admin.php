<?php

use App\Http\Controllers\Admin\Auth\CustomAuthController;
use App\Http\Controllers\Admin\AdminController;
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


Route::match(['get', 'post'], '/login', [CustomAuthController::class, 'login'])->name('admin.login');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('admin.logout');

Route::match(['get', 'post'], '/register', [CustomAuthController::class, 'register'])->name('admin.register');
Route::match(['get', 'post'], '/reset_pass', [CustomAuthController::class, 'resetPass'])->name('admin.reset_pass');
Route::match(['get', 'post'], '/recovery_pass', [CustomAuthController::class, 'recoveryPass'])->name('admin.recovery_pass');

Route::middleware('auth:admin')->group(function (){
    Route::get('/', [CustomAuthController::class, 'index'])->name('admin.index');
    Route::get('/export', [CustomAuthController::class, 'export'])->name('admin.export');
    Route::post('/export/file', [CustomAuthController::class, 'exportFile'])->name('admin.exportFile');
    Route::post('/import', [CustomAuthController::class, 'import'])->name('admin.import');
    Route::match(['get', 'post'],'/rule', [CustomAuthController::class, 'rule'])->name('admin.rule');
    Route::resources([
        'post'          => PostController::class,
        'comment'       => CommentController::class,
        'image'         => ImageController::class,
        'role'         => Admin\RoleController::class
    ]);
});