<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\AuthServiceProvider;
use App\Providers\RouteServiceProvider;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{


    public function create(){

        if(Auth::check()){
            return redirect(RouteServiceProvider::HOME);
        }
        return view('register');
        
    }

    //
    public function store(Request $request){

        $request->validate(['email' => ['required','string','email'],
         'password' => ['required','string']]);


        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' =>  $request->email,
        ]);


        Auth::login($user);


        return redirect(RouteServiceProvider::HOME);

        }
}
