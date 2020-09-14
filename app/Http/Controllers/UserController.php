<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function profile(User $user){
        $user = User::find($user);
        return view('admin.my_profile',compact('user'));
    }
}
