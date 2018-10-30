@extends('layouts.app')

@section('content')
<h1>Proposals</h1>
	@if(count($proposals)>0)
		@foreach($proposals as $proposal)
		<div class="card card-body bg-light">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					 @if(count($approve->where('proposal_id',$proposal->id)->sort()->where('approve',true)) >= 3)
                                <br>
                                <p class="text-success">Approved!</p>
                                @elseif(count($approve->where('proposal_id',$proposal->id)->sort()->where('approve',true)) > 2)
                                <p class="text-success">Declined</p>
                                @else

                                <p class="text-danger">Under-Review</p>
                                @endif
				</div>
				<div class="col-md-8 col-sm-8">
				<h3><a href="/proposals/{{$proposal->id}}">{{$proposal->title}}</a></h3>
				<h4>{{$proposal->Activities}}</h4>

				</div>
			</div>
			
		</div>
		@endforeach
		<hr>
		{{$proposals->links()}}
		@else
		<p>No Post</p>
	@endif
@endsection