<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollSearchRequest;
use App\Http\Requests\ResultRequest;
use App\Polls;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function submitResult(ResultRequest $request,$poll_id){
        $request['poll_id'] = $poll_id;
        $request['user_id'] = Auth::user()->id;
        Result::create($request->all());
        return redirect('/poll/search')->with('success','Your Candidate has been submitted successfully!!! ');
        // return $request;
    }
}
