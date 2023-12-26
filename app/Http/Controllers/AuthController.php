<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        // User::create([
        //     'name'=>'roosvelt',
        //     'email'=>'admin@gmail.com',
        //     'password'=>Hash::make('12345678')
        // ]);
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request){
        $credentials =  $request->validated();
        if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        
        return redirect()->intended(route('admin.property.index'));

    }  else{
        return back()->withErrors([
            'email'=>'Indentifiant incorrect'
            ])->onlyInput('email');
    }
    }

    public function logout(){
       Auth::logout();
       return to_route('login')->with('success','Vous etes maintenant deconnecte');
    }
}
