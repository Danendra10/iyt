<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
Buatlah variabel yang dapat dipahami orang banyak
|
*/

Route::get('/', function () {
    return view('main.home');
});

Route::get('/login', function () {
    return view('main.login');
});


Route::post("/login", [UserController::class, "login"]);
Route::get("/logout", [UserController::class, "logout"]);

Route::get("/verify/{email}", [UserController::class, "verifyAccount"]);

// >>>>>>>>>>>>>>>>>>>>>>>>
// register group
// >>>>>>>>>>>>>>>>>>>>>>>>

Route::prefix('register')->group(function () {
    Route::get('/', function () {
        return view('main.register');
    });

    Route::post("/send", [UserController::class, "register"]);
    Route::get("/user", function () {
        return view('main.user-register');
    });
    Route::get("/partner", function () {
        return view('main.partner-register');
    });
    Route::post("/switch", [UserController::class, "changeRegister"]);

    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    Route::post("/user", [UserController::class, "userRegister"]);
    Route::post("/partner/send", [UserController::class, "partnerRegister"]);
});

Route::post("/login/switch", [UserController::class, "loginSwitch"]);


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

Route::prefix("/user")->group(function () {
    Route::get("/home", function () {
        return view("user.home");
    });

    Route::get("/vendor", function () {
        return view("user.vendor.vendor");
    });

    Route::get("/EO", function () {
        return view("user.EventOrganizer.EO");
    });

    Route::get("/cart", function () {
        return view("user.cart");
    });

    Route::get("/login", function(){
        return view("user.user-login");
    });


    Route::post("/login", [UserController::class, "loginUser"]);
});

Route::prefix("/partner")->group(function () {
    Route::prefix("/vendor")->group(function () {
        //>>>>>>>>>>>>>>>>>>>>>>>>>
        //GET
        //>>>>>>>>>>>>>>>>>>>>>>>>>
        Route::get("/login", function(){
            return view("partner.Vendor.login");
        });
        Route::get("/dashboard", function () {
            return view("partner.Vendor.dashboard");
        });

        //>>>>>>>>>>>>>>>>>>>>>>>>>
        //POST
        //>>>>>>>>>>>>>>>>>>>>>>>>>
        // Route::post("/login", [VendorController::class, "login"]);
        Route::post("/login", [UserController::class, "loginVendor"]);
    });

    Route::prefix("/event-organizer")->group(function(){
        Route::get("/login", function(){
            return view("partner.Event-Organizer.login");
        });
        Route::get("/dashboard", function () {
            return view("partner.Event-Organizer.dashboard");
        });
    });
});
