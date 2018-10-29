<?php

namespace App\Http\Controllers;
use App\Proposal;
use Illuminate\Http\Request;
use App\Approve;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Illuminate\Support\Facades\Session;

class AdminProposalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth:admin');
    
    }

    public function index()
    {
          $proposals = Proposal::orderBy('created_at','desc')->paginate(10);
          $id = Auth::user()->id;
        $user = Admin::find($id);
        return view('admin.proposals.index')->with(array('proposals'=> $proposals,'user' =>$user));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $proposal = Proposal::find($id);
                return view('admin.proposals.show')->with('proposal',$proposal);
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
    public function update(Request $request, $id)
    {
        //
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
    }

    public function postApprove(Request $request)
    {
         $proposal_id = $request['proposalId'];
         $is_approve = $request['isApprove'] == 'true';
        $update = false;
        $proposal = Proposal::find($proposal_id);
         if (!$proposal) {
             return null;
         }
        $id = Auth::user()->id;
        $user = Auth::user();
        $approve = $user->approves()->where('proposal_id', $proposal_id)->first();
        if ($approve) {
            $already_approve = $approve->approve;
            $update =false;
            if ($already_approve == $is_approve) {
                $approve->delete();
                return null;
            }
            } else {
                $approve = new Approve();
            }

            $approve->approve = $is_approve;
            $approve->admin_id = $user->id;
            $approve->proposal_id = $proposal->id;

            if ($update) {
                $approve->update();

            } else {
                $approve->save();
            }
            return null;
        
    }
}
