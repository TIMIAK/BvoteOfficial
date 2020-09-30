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
    public function index(){
        return view('guest.home');
    }
    public function about(){
        return view('guest.about');
    }
    public function services(){
        return view('guest.services');
    }
}
