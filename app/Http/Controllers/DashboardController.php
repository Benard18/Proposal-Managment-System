<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Admin;
use App\Approve;
class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $User_id = auth()->user()->id;
        $user = User::find($User_id);

          $id = Auth::user()->id;
        $approve = Approve::all();
        return view('dashboard')->with(array('proposals'=>$user->proposals,'approve'=>$approve));
    }

    public function about()
    {   
        $admins = Admin::all();
        return view('about')->with('admins',$admins);
    }
}
