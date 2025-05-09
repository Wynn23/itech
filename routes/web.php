<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SocialAuthController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'index']);
// Artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel.show');

// Course / Programming Edukasi


Route::get('/course', [CourseController::class, 'index'])->name('course.index');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');

// Feedback
Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Postingan User
Route::get('/postingan', [PostController::class, 'index'])->name('postingan.index');
Route::get('/postingan/create', [PostController::class, 'create'])->name('postingan.create');
Route::post('/postingan', [PostController::class, 'store'])->name('postingan.store');

// Profil User
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});
Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/frameworks/{id}', [FrameworkController::class, 'show'])->name('frameworks.show');




Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Artikel
    Route::resource('artikel', \App\Http\Controllers\Admin\ArtikelController::class);

    // Gambar Edukasi
    Route::resource('gambar', \App\Http\Controllers\Admin\GambarController::class);

    // Programming Edukasi (Courses)
    Route::resource('courses', \App\Http\Controllers\Admin\CourseController::class);

    // Feedback
    Route::get('feedback', [\App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('feedback.index');
    Route::delete('feedback/{id}', [\App\Http\Controllers\Admin\FeedbackController::class, 'destroy'])->name('feedback.destroy');

    // Postingan User
    Route::resource('postingan', \App\Http\Controllers\Admin\PostinganController::class);

    // User
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    // Logout
    Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});
