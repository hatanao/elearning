<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class AdminController extends Controller
{

    public function index(){
        // except login user and admin 
        if(auth()->user()->is_admin == 1){
            $users = User::where("id" , "!=" , Auth::user()->id)
                      ->where('is_admin', '==', 0)->paginate(3);
        }
        else{
            $users = User::where("id" , "!=" , Auth::user()->id)->paginate(3);
        }
        return view('admin.adminHome', compact('users'));
    }

    
    public function createAdmin()
    {   
        return view('admin.createAdmin');
    }
    
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    public function storeAdmin(){

        $user = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password),            
            ]);
        
        $user->is_admin = 1;
        $user->save();
        return redirect('/admin/home');
    }

    public function deleteUser($userId){
        User::where('id', $userId)->delete(); 
        return redirect()->back();
    }
}
