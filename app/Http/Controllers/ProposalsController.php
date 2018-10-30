<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Proposal;
use Illuminate\Support\Facades\Input;
use App\Approve;

class ProposalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }
    public function index()
    {
         $proposals = Proposal::orderBy('created_at','desc')->paginate(10);
          $approve = Approve::all();
        return view('proposals.index')->with(array('proposals'=>$proposals,'approve'=>$approve));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proposals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);
        $proposal = new Proposal;
        $proposal->title = $request->input('title');
        $proposal->body = $request->input('body');
        $proposal->user_id = auth()->user()->id;
        $proposal->Activities= $request->input('Activities');
        $proposal->Budget= $request->input('Budget');
        $proposal->save();

        return redirect('/proposals')->with('success', 'Proposal Created');
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
         $approve = Approve::all();
                return view('proposals.show')->with(array('proposal'=>$proposal,'approve'=>$approve));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
                $proposal = Proposal::find($id);
                // // check for correct user
                if(auth()->user()->id !==$proposal->user_id){

                return redirect('/posts')->with('error', 'UnAuthorized Page');
                }
                return view('proposals.edit')->with('proposal',$proposal);
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
        $proposal = Proposal::find($id);
         if(auth()->user()->id !==$proposal->user_id){

                return redirect('/proposals')->with('error', 'UnAuthorized Page');
                }
         if($proposal->cover_image != 'noimage.jpeg'){
            //Delete Image
            Storage::delete('public/cover_images/'.$proposal->cover_image);
         }
         $proposal->delete();
        return redirect('/proposals')->with('success', 'Proposal Deleted');
    }
}
