{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Reset Password</title>--}}
{{--    <style>--}}
{{--        body {--}}
{{--            font-family: Arial, sans-serif;--}}
{{--            background-color: #f5f5f5;--}}
{{--            padding: 20px;--}}
{{--        }--}}

{{--        .container {--}}
{{--            max-width: 400px;--}}
{{--            margin: 0 auto;--}}
{{--            background-color: #ffffff;--}}
{{--            padding: 20px;--}}
{{--            border-radius: 5px;--}}
{{--            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);--}}
{{--        }--}}

{{--        h2 {--}}
{{--            text-align: center;--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}

{{--        .form-group {--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}

{{--        label {--}}
{{--            display: block;--}}
{{--            font-weight: bold;--}}
{{--            margin-bottom: 5px;--}}
{{--        }--}}

{{--        input[type="password"],--}}
{{--        button {--}}
{{--            width: 100%;--}}
{{--            padding: 10px;--}}
{{--            border-radius: 5px;--}}
{{--            border: 1px solid #ccc;--}}
{{--        }--}}

{{--        button {--}}
{{--            background-color: #4caf50;--}}
{{--            color: white;--}}
{{--            cursor: pointer;--}}
{{--        }--}}

{{--        button:hover {--}}
{{--            background-color: #45a049;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <h2>Reset Password</h2>--}}
{{--    <form method="post" class="password.update" action="{{ route('password.update') }}">--}}
{{--        @csrf--}}
{{--        <input type="hidden" name="token" value="{{ $token }}">--}}
{{--        <div class="form-group">--}}
{{--            <label for="new-password">Email:</label>--}}
{{--            <input type="email" name="email" id="new-password" value="{{ old('email') }}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="new-password">New Password:</label>--}}
{{--            <input type="password" name="password" id="new-password" placeholder="Enter new password">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="confirm-password">Confirm Password:</label>--}}
{{--            <input type="password" name="password_confirmation" id="confirm-password" placeholder="Confirm new password">--}}
{{--        </div>--}}
{{--        <button type="submit">Reset Password</button>--}}
{{--    </form>--}}
{{--</div>--}}
{{--</body>--}}

{{--</html>--}}


    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password - Site Zoon</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <link rel="stylesheet" href="{{asset('css/bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('css/stylef.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container pt-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-center">
            <img src="{{asset('logo/main.png')}}" alt="Main IMG" class="img-fluid">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-5">
            <h2 class="main-text pt-5 mt-5">Forgot <br> Your Password</h2>
            <form method="post" action="{{route('password.update')}}" class="password.update">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="email" name="email" class="form-control main-input mt-5" id="email" value="{{ old('email') }}" placeholder="Enter email">
                <input type="password" class="form-control main-input mt-5" name="password" id="new-password" placeholder="Enter new password">
                <input type="password" class="form-control main-input mt-5" name="password_confirmation" id="confirm-password" placeholder="Confirm new password">
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-sz-primary mt-5">Reset</button>
                    </div>
                    <div class="col-6 pt-5">
                        <a href="#" class="back-to-login">Back To Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap5.js')}}"></script>
</html>
