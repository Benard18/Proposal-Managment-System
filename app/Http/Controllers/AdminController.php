<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Approve;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approves = Approve::all()->sort();
        return view('admin')->with('approves',$approves);
    }
}
