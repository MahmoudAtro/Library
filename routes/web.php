<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Categories;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;


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

Route::get('/', function () {
    return view('main');
});
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});


// test rest password 



Route::get('forgot-password', function () {
    return view('auth.forget');
})->middleware('guest')->name('password.request');

Route::post('forgot-password', [AuthController::class , "sendpasswordlink"])->middleware('guest')->name('password.email');

Route::get('reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('reset-password', [AuthController::class , "restpassword"])->middleware('guest')->name('password.update');



Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Book Controller
Route::resource('book', BookController::class)->middleware('auth');
Route::get('/book-manager', [Categories::class, 'managerbook'])->middleware('auth')->name('bookmanager');
Route::get('/read-book/{id}', [Categories::class, 'readbook'])->name('readbook');
Route::get('/upload-book/{id}', [Categories::class, 'uploadpdf'])->name('uploadpdf');


//User Manager
// Route::get('/user-manager' , [UserController::class , 'index'])->middleware('auth')->name('user-manager');
// Route::delete('/user' , [UserController::class , 'destroy'])->name('user.destroy');
Route::resource('user', UserController::class)->middleware('auth');


//Book Categories
Route::get('/book-روايات', [Categories::class, 'firstcat'])->middleware('auth')->name('bookcat');
Route::get('/book-دينية', [Categories::class, 'secondcat'])->middleware('auth')->name('bookcat2');

// search book or author
Route::get("/search", [AuthController::class, 'search'])->name("search");

//content
Route::get('/contact-us', [ContactController::class, 'index'])->middleware('auth')->name('contact');
Route::post('contact', [ContactController::class, 'sendEmail'])->name('contact.us');


Route::get('/about-me', function () {
    return view('content.about');
})->middleware('auth')->name('about');

//content --> profile
Route::resource('profile', ProfileController::class)->middleware('auth');
Route::get('/profile-setting', [AuthController::class, 'setting'])->middleware('auth')->name('profile-setting');