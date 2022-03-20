<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('main.home');
});

Route::get('/login', function () {
    return view('main.login');
});

Route::get('/register', function () {
    return view('main.register');
});


Route::prefix("/main")->group(function () {
    Route::get('/about', function () {
        return view('main.about');
    });

    Route::get('/news', function () {
        return view('main.news');
    });

    Route::get('/contact', function () {
        return view('main.contact');
    });

    Route::get('/shop', function () {
        return view('main.shop');
    });

    Route::get('/single-product', function () {
        return view('main.single-product');
    });

    Route::get('/checkout', function () {
        return view('main.checkout');
    });

    Route::get('/cart', function () {
        return view('main.cart');
    });
});

Route::post("/register/send", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);

Route::get("/verify/{email}", [UserController::class, "verifyAccount"]);