<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100%;
                margin: 0;
            }

    

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
             .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref" style="color:white;background-color:rgba(0,0,0,0.5);">
            <div class="top-left links">
                <a href="{{ url('/about') }}">About</a>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <div class="container-fluid" style="margin-top: 250px;margin-bottom: 400px;">
          <div class="row">
              <div class="col-md-6">
                    <h1>About Us</h1>
                  <p style="font-size: 30px;">Changing the lives of people by providing for them the necessary ways of giving us inovative ideas of changing the way we conduct things in our company!</p>
              </div>
              <div class="col-md-6">
                  <h1>The Staff</h1>
                  @foreach($admins as $admin)
                  <div class="card">
                  <h2 class="card-header">{{$admin->name}}</h2>
                    <small class="cardbody">
                        {{$admin->job_title}}
                    </small>                      
                  </div>
                  @endforeach
              </div>
          </div>
        </div>
        </div>
    </body>
</html>
