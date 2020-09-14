<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function submit(){
        return view('guest.submit');
    }
}
