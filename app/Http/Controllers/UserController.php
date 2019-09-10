<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use Storage;

class UserController extends Controller
{
    public function edit($id)
    {   

        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }
        $user = Auth::user();
        return view('settings', compact('user' ,'is_image'));
    }

    public function update($id)
    {

        $file = request()->file('image')->getClientOriginalName();

        request()->file('image')->storeAs('public/images', $file);

        $user = Auth::user()->update([
            'name' => request()->new_name,
            'email' => request()->new_email,
            'avatar' => '/storage/images/'.$file
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
