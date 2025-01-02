<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request){

        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email' ,'unique:users'],
            'password' =>['required', 'min:3', 'confirmed'],
            'image' => ['file', 'nullable', 'max:512']
        ]);

        if($request->hasFile('image')){
            $fields['image'] = Storage::disk('public')->put('images', $request->image);
        }

        $user = User::create($fields);

        Auth::login($user);

        return redirect()->route('dashboard')->with('greeting', 'You are welcome to our Dashboard');
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' =>['required', 'min:3'],
        ]);

        if(Auth::attempt($fields, $request->remember)){
            $request->session()->regenerateToken();

            return redirect()->route('dashboard');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
