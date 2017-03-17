<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            a {
                text-decoration: none;
            }
            .links > a {
                color: #000;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .extra {
                display: inline;
                font-size: 0.8em;
                color: #636b6f;
                padding: 0 5px;
                font-family: sans-serif;
            }
            ul {
                text-align: left;
                list-style: none;
            }
            ul.pagination {
                text-align: center;
            }
            ul.pagination > li {
                display: inline;
                font-size: 0.8em;
                color: #636b6f;
                padding: 0 25px;
                font-family: sans-serif;
            }
            .votearrow {
                width: 10px;
                height: 10px;
                border: 0px;
                margin: 3px 2px 6px;
                background: url(grayarrow.gif) no-repeat;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/submit') }}">Submit</a>
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                @include('shared.link_list')
            </div>
        </div>
    </body>
</html>
