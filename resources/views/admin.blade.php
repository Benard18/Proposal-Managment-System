@extends('layouts.apps')

@section('content')

<div class="container" align="center">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Name:{{Auth::user()->name}}</h4>
                            <h3>Title:{{Auth::user()->job_title}}</h3>

                        </div>
                        <div class="col-md-6">
                        <p>We Have Proposals to be dealt with<a href="/admin/proposals/"> here</a>
                
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
