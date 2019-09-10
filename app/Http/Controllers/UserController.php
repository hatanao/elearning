<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use Storage;
use Validator;

class UserController extends Controller
{
    public function edit($id)
    {   
        $user = Auth::user();
        return view('settings', compact('user'));
    }

    public function update($id){

        $user = Auth::user()->update([
            'name' => request()->new_name,
            'email' => request()->new_email,
        ]);


        if(request()->file('image')){

            request()->validate([
                'image' => 'mimes:jpeg,bmp,png',
                'image' => 'max:2048'
            ]);

            $file = request()->file('image')->getClientOriginalName(); 

            request()->file('image')->storeAs('public/images', $file); 
            
            $user = User::find($id);
            $user->avatar = '/storage/images/'.$file;
            $user->save();
        }
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

        return view('home')->with('success' , 'message'); 
    }

    public function showFollowing(){
        $users = Auth::user()->following()->paginate(3);
        return view('users.usersList', compact('users'));
    }
    public function showFollowers(){
        $users = Auth::user()->followers()->paginate(3);
        return view('users.usersList', compact('users'));
    }

    public function showUserProfile($id)
    {
        $user = User::find($id); 
        return view('users.userProfile', compact('user'));
    }

    public function follow($id){
        Auth::user()->following()->attach($id);
        
        return redirect()->back();
    }
    public function unfollow($id){
        Auth::user()->following()->detach($id);
        
        return redirect()->back();
    }
}
