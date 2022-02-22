<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Carbon::parse(Auth::user()->updated_at)->format('H:i:s') != Carbon::parse(Auth::user()->created_at)->format('H:i:s')){
            return view('home');
        }
        else{
            return redirect()->route('changePass');
        }
    }
}
