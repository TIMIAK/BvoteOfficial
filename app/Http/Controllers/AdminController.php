<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollRequest;
use App\Http\Requests\PollSearchRequest;
use App\Http\Requests\ResultRequest;
use App\Polls;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $polls = Auth::user()->polls->sortByDesc('created_at');
        return view('admin.my_polls',compact('polls'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }
    public function pollSearch(){
        return view('admin.submit_search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PollRequest $request)
    {
        $voteid = 'BV'.rand(100,999);
        $request['voteid'] = $voteid;
        Auth()->user()->polls()->create($request->all());

        return redirect(route('poll.index'))->with('success','Poll created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = Polls::find($id);
        if($poll){

            return view('admin.edit_poll',compact('poll'));
        }
        return Redirect::route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PollRequest $request, $id)
    {
        $poll = Polls::find($id);
        $poll->update($request->all());
        return redirect(route('poll.index',$id))->with('success','Poll Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poll = Polls::find($id);
        $poll->delete();
        return redirect()->back()->with('success','Poll Deleted!');
    }
    public function viewResult($poll_id){
        $results = DB::table('results')->where('poll_id',$poll_id)->get();
        $poll_detail = DB::table('polls')->where('id',$poll_id)->first();
        return view('admin.Result',compact('results','poll_detail'));
    }
    public function submitResult(ResultRequest $request,$poll_id){
        $request['poll_id'] = $poll_id;
        $request['user_id'] = Auth::user()->id;
        Result::create($request->all());
        return redirect(route('poll.search'))->with('success','Your Candidate has been submitted successfully!!! ');
    }
    public function submitSearch(PollSearchRequest $request)
    {

        $vote_id = DB::table('polls')->where('voteid',$request->voteid)->value('id');
        $polldetail = DB::table('polls')->where('voteid',$request->voteid)->first();
        if($polldetail == ''){
            return redirect()->back()->with('error','Unable to Find this Poll with ID '. $request->voteid);
        }
        $time =  time() + 60*60;
        if(date('Y-m-d') >= $polldetail->end_date){
            if(date('H:i',$time) > $polldetail->end_time){
                return redirect()->back()->with('error','This Poll Has ended');
            }
            else{
                $check_eligiblilty = DB::table('results')->where([
                    ['poll_id', '=' ,$vote_id],
                    ['user_id','=',Auth::user()->id],
                ])->first();
                if($check_eligiblilty == ''){
                    return view('admin.submit_poll',compact('polldetail'));
                }
                else{
                    return redirect()->back()->with('error','You Have Already Completed this Poll!!!');
                }
            }
        }
        elseif( date('Y-m-d') >= $polldetail->start_date){
            if(date('H:i',$time) >= $polldetail->start_time){
                $check_eligiblilty = DB::table('results')->where([
                    ['poll_id', '=' ,$vote_id],
                    ['user_id','=',Auth::user()->id],
                ])->first();
                if($check_eligiblilty == ''){
                    return view('admin.submit_poll',compact('polldetail'));
                }
                else{
                    return redirect()->back()->with('error','You Have Already Completed this Poll!!!');
                }
            }

            else{
                return redirect()->back()->with('error','This Poll is yet to start. Please try again later');

            }
        }
        else{
            return redirect()->back()->with('error','This Poll is yet to start. Please try again later');

        }
    }


}
