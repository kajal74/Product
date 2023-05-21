<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;

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



Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup.submit');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


Route::middleware(['auth'])->group(function () {



    Route::get('/',[ ProductController::class,'index'])->name('products.index');
    Route::get('/products/create',[ ProductController::class,'create'])->name('products.create');
    Route::get('/products/search',[ ProductController::class,'search'])->name('products.search');
    Route::post('/products/store',[ ProductController::class,'store'])->name('products.store');
    Route::get('products/{id}/edit',[ProductController::class,'edit']);
    Route::get('products/{id}/update',[ProductController::class,'update']);
    Route::get('/products/{{id}}/delete',[ ProductController::class,'distroy'])->name('products.distroy');
    
    });



