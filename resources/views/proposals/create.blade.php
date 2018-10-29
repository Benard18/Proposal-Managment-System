@extends('layouts.app')

@section('content')
<h1>Create Posts</h1>
{!! Form::open(['action'=> 'ProposalsController@store','method' =>'POST']) !!}
    <div class="form-group">
    	{{Form::label('title','Title')}}
    	{{Form::text('title','',['class'=> 'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        	{{Form::label('body','Proposal Description')}}
    	{{Form::textarea('body','',['id'=>'article-ckeditor','class'=> 'form-control','placeholder'=>'Body'])}}
{{Form::label('Activities','Proposal Activities')}}
        {{Form::textarea('Activities','',['id'=>'article-ckeditor','class'=> 'form-control','placeholder'=>'Proposal Activities'])}}
{{Form::label('Budget','Proposal Budget')}}
        {{Form::text('Budget','',['id'=>'article-ckeditor','class'=> 'form-control','placeholder'=>'Proposal Budget'])}}

    </div>
    <div class="form-group">

    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

{!! Form::close() !!}
@endsection