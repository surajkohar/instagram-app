<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashbaordController;
use App\Http\Controllers\EmployeeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




Route::get('/', [PostController::class, 'index'])->name('home');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/employee', [EmployeeController::class, 'create']);
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employee/list', [EmployeeController::class, 'index']);




Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('/dashboard', function(){
    //     return 'hello';
    // });

    Route::get('/admin/dashboard', [DashbaordController::class,   'index'])->name('admin.index');
});
