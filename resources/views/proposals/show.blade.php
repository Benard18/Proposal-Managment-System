@extends('layouts.app')

@section('content')
<a href="/proposals" class="btn btn-outline-dark">Go Back</a>
<hr>
<h1>{{$proposal->title}}</h1>

<div>
	<h1>Description</h1>
	{!! $proposal->body !!}

</div>
<hr>
<div>
	<h1>Activities</h1>
	{!! $proposal->Activities !!}

</div>
<hr>
<div>
	<h1>Budget</h1>
	{!! $proposal->Budget !!}

</div>
<hr>
<small>Written on {{$proposal->created_at}}  </small>
<hr>

@if(!Auth::guest())
	@if(Auth::user()->id == $proposal->user_id)
		<a href="/proposals/{{$proposal->id}}/edit" class="btn btn-outline-dark">Edit</a>
		{!!Form::open(['action' => ['ProposalsController@destroy',$proposal->id], 'method'=>'POST' ,'class'=>'float-right'])!!}
			{{Form::hidden('_method','DELETE')}}
			{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
		{!!Form::close()!!} 
			@endif	
@endif
@endsection