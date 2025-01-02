<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



// Route::get('/about', function(){
//     return inertia('About', ['user' => 'Micheal']);
// });

// Route::inertia('/about', 'About', ['user' => 'Ray Mon'])->name('about');

Route::middleware('auth')->group(function(){
    Route::inertia('/', 'Home', ['user' => User::paginate(5)])->name('home');
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::inertia('/register', 'Auth/register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});






