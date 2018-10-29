@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="/proposals/create" class="btn btn-primary">Create Proposal</a>
                    <hr>
                   <h3> Your Proposals</h3>
                   @if (count($proposals) >0)
                   <table class="table table-striped">
                       
                       @foreach($proposals as $proposal)
                            <tr>
<td>{{$proposal->title}}</td>
                                
                                <td><a href="/proposals/{{$proposal->id}}/edit" class="btn btn-dark float-right">Edit</a></td>
                                <td>{!!Form::open(['action' => ['ProposalsController@destroy',$proposal->id], 'method'=>'POST' ,'class'=>'float-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}</td>
                                @if(count($approve->where('proposal_id',$proposal->id)->sort()->where('approve',true)) >= 3)
                                <br>
                                <td class="text-success">Approved!</td>
                                @elseif(count($approve->where('proposal_id',$proposal->id)->sort()->where('approve',true)) > 2)
                                <td class="text-success">Declined</td>
                                @else

                                <td class="text-danger">Under-Review</td>
                                @endif
                            </tr>
                       @endforeach
                   </table>
                   @else
                   <table class="table table-striped">
                    <tr>
                        <th>Nothing yet</th>
                    </tr>
                       
                   </table>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">USER Dashboard</div>

                <div class="card-body">
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
