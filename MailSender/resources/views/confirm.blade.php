
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link href="{{ asset('/assets/css/login.css') }}" rel="stylesheet">
</head>
<body>


<div class="container ">
    <div class="row ">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @if(Session::has('user'))
                    <h1> {{Session::get('user')->name}} please check your email for confirmation</h1>

                    <p>For development purposes u can get confirmation link here or you can check your email</p>
                    <a href="{{route('sendVerificationEmail',['email'=>Session::get('user')->email,'token'=>Session::get('user')->token])}}">Confirmation link</a>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>



