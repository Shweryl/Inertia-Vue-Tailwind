<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



// Route::get('/about', function(){
//     return inertia('About', ['user' => 'Micheal']);
// });

// Route::inertia('/about', 'About', ['user' => 'Ray Mon'])->name('about');

Route::middleware('auth')->group(function(){
    Route::get('/', function(Request $request){
        // passing searched and paginated users
        return inertia('Home', [
            'users' => User::when($request->search, function($q) use ($request) {
                $q->where('name', 'like', "%$request->search%");
            })->paginate(5)->withQueryString(),
            'searchTerm' => $request->search,
        ]);
    })->name('home');
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::inertia('/register', 'Auth/register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});






