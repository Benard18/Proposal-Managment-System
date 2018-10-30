@extends('layouts.apps')
@section('content')
	<div class="container">
		<div class="pm-header">
			<h2>Proposals Today!!</h2>
			<hr>
		</div>
		<div class="row">
			<div class="col-sm-8">
			
			<div class="pm-proposal">
				@foreach ($proposals as $proposal)
				<div class="proposal" data-proposalid="{{$proposal->id}}"><a href="/admin/proposals/{{$proposal->id}}"><h1>{{$proposal->title}}</h1></a>
					<h6>Posted on {{$proposal->created_at}} by  {{$proposal->user->name}}</h6>
					<p>{{$proposal->body}}</p>
					
					<hr>
				@endforeach
			</div>
			</div>

		</div>
	</div>
@endsection