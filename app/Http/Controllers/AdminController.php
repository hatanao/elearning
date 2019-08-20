<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class AdminController extends Controller
{
    public function adminLogin(){
        return view('auth.adminLogin');
    }
    public function adminShowRegister(){
        return view('auth.adminRegister');
    }

    public function adminRegister(){
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = request()->all();
        $data['password'] = Hash::make($data['password']);

       $user = User::create($data);
       $user->is_admin = 1;
       $user->save();

       Auth::guard()->login($user);

       return redirect('/home'); 
    }
}
