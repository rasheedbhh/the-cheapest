<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Cheapest</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
        body{
            background-image: url('images/home.png');
            background-size: cover;
            color: #5B93D3;
            font-family: 'Nunito', sans-serif;
            width: 100%;
            overflow-x: hidden;
        }
        h1{
            font-size: 25px;
        }
        #info{
            position: absolute;
            top: 40%;
            left: 27%;
        }
        .button{
            background: #A9363A;
            border-radius: 5px;
            padding: 10px 15px;
            text-decoration: none;
            transition: 0.5s;
            color: white;
        }
        .button:hover{
            background: #7CFC00;
            color: white;
            transition: 0.5s;
        }
    </style>
    </head>
    <body >
        <div class="container" id="info">
            <div class="row">
                <h1>The Cheapest</h1>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="button">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="button">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
