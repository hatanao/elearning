<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class AdminController extends Controller
{

    public function index(){
        $users = User::where("id" , "!=" , Auth::user()->id)->paginate(3);
    
        return view('admin.adminHome', compact('users'));
    }


    public function deleteUser($userId){
        User::where('id', $userId)->delete(); 
        return redirect()->back();
    }
}
