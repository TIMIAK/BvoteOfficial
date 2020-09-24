<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollRequest;
use App\Polls;
use Illuminate\Http\Request;
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
        //
        $polls = Polls::all()->sortBy('created_at');
        return view('admin.my_polls',compact('polls'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // dd(date("h:i:s")->addHour(1));
        // if($request->start_date >= Date('Y-m-d')){
        //     $request['status'] = "Running";
        // }
        // else{
        //     $request['status'] = "Pending";
        // }
        $voteid = 'BV'.rand(100,999);
        $request['voteid'] = $voteid;
        Auth()->user()->polls()->create($request->all());
        // dd($request->status);

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
        //
        $poll = Polls::find($id);
        if($poll){

            return view('admin.edit_poll',compact('poll'));
        }
        return Redirect::route('home');
        // dd($id);
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
        //
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
        //
        $poll = Polls::find($id);
        $poll->delete();
        return redirect()->back()->with('success','Poll Deleted!');
    }


}
