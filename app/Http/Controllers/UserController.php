<?php

namespace App\Http\Controllers;

use App\Polls;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('admin.my_profile',compact('user'));
    }
    public function polls(){
        $polls = Auth::user()->polls;
        // $candidates = Str::of($polls->candidates)->explode(',');
        // return ;
        // dd($polls);
        return view('admin.my_polls',compact('polls'));
}
    // public function deletepoll(Polls $id)
    // {
    //     //
    //     $id->delete();
    //     return redirect()->back()->with('success','Poll Deleted');
    // }

}
