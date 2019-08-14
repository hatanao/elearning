<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function edit($id)
    {   
        $user = Auth::user();
        return view('settings', compact('user'));
    }

    public function update($id)
    {
        $user = Auth::user()->update([
            'name' => request()->new_name,
            'email' => request()->new_email,
        ]);
        if(request()->password){
            //validation rule
            request()->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);
            if(Hash::check(request()->current_password, Auth::user()->password)){
                Auth::user()->update([
                    'password' => Hash::make(request()->password)
                ]);
            } else {
                return "incorrect password";
            }
            
        }
        return redirect('home');
    }
    public function showFollowing(){
        $users = Auth::user()->following()->get();
        return view('users.usersList', compact('users'));
    }
    public function showFollowers(){
        $users = Auth::user()->followers()->get();
        return view('users.usersList', compact('users'));
    }
}
