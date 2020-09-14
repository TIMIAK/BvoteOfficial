<?php

namespace App\Http\Controllers;

use App\Polls;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function profile($user){
        $user = User::find($user);
        return view('admin.my_profile',compact('user'));
    }
    public function polls($user){
        $polls = Auth()->user()->polls;
        // $candidates = Str::of($polls->candidates)->explode(',');
        // return ;
        dd($polls->office);
        // return view('admin.my_polls',compact('polls'));
    }
}
