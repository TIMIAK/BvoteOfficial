<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollRequest;
use App\Polls;
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
        $polls = Auth::user()->polls->sortBy('created_at');
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

        return redirect()->back()->with('success','Poll created successfully');
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


}
