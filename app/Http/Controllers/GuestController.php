<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollSearchRequest;
use App\Polls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    //
    public function index(){
        return view('guest.home');
    }
    public function about(){
        return view('guest.about');
    }
    public function services(){
        return view('guest.services');
    }
    public function pollSearch(){
        return view('guest.submit_search');
    }
    public function submitSearch(PollSearchRequest $request)
    {
        // return $request->voteid;
        // return 123;
        $polldetail = DB::table('polls')->where('voteid',$request->voteid)->first();
        if($polldetail == ''){
            return redirect()->back()->with('error','Unable to Find this Poll with ID '. $request->voteid);
        }
        else{
            return view('guest.submit_poll',compact('polldetail'));
        }
    }
}
