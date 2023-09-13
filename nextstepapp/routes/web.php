<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\BlogController; 
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ProfilController; 
use App\Http\Controllers\WorkController; 
use App\Http\Controllers\PostController; 
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
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('action-login', [LoginController::class, 'actionLogin'])->name('actionlogin');
Route::post('gantipass', [UserController::class, 'gantipass'])->name('gantipass');
Route::get('/gantipass', [UserController::class, 'tampilpass']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profil', [ProfilController::class, 'index'])->name('user.profil');
Route::get('/friends', [ProfilController::class, 'showProfile']);
Route::get('/blog', [BlogController::class, 'index']);
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');
Route::post('/simpanuser', [UserController::class, 'simpanuser'])->name('simpanuser')->middleware('auth');
Route::get('/work', [WorkController::class, 'index']);
Route::get('/editprofil', [UserController::class, 'edit']);
Route::post('/editp/{id}', [UserController::class, 'update'])->name('editp');
Route::post('/dashboard', [PostController::class, 'index'])->name('posts.create');
