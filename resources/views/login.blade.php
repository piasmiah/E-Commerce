{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <script src="https://kit.fontawesome.com/0b1902fdb8.js" crossorigin="anonymous"></script>--}}
{{--    <style>--}}
{{--        body {--}}
{{--            font-family: Arial, sans-serif;--}}
{{--            background-color: #FFFFFF;--}}
{{--            margin: 0;--}}
{{--            display: flex;--}}
{{--            justify-content: center;--}}
{{--            align-items: center;--}}
{{--            height: 100vh;--}}
{{--        }--}}

{{--        .container {--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .form-container {--}}
{{--            width: 400px;--}}
{{--            padding: 20px;--}}
{{--            background-color: #FED8B1;--}}
{{--            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);--}}
{{--            border-radius: 10px;--}}
{{--            position: relative;--}}
{{--            overflow: hidden;--}}
{{--        }--}}

{{--        h2 {--}}
{{--            color: #000000;--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}

{{--        .form-group {--}}
{{--            margin-bottom: 20px;--}}
{{--            text-align: left;--}}
{{--        }--}}

{{--        .label {--}}
{{--            font-weight: bold;--}}
{{--            display: block;--}}
{{--            margin-bottom: 5px;--}}
{{--            color: #C0C0C0;--}}
{{--        }--}}

{{--        .form-control {--}}
{{--            width: 95%;--}}
{{--            padding: 10px;--}}
{{--            border: 5px solid transparent; /* Transparent border to start */--}}
{{--            border-radius: 10px;--}}
{{--            font-size: 15px;--}}
{{--            transition: border-color 0.3s; /* Transition for border color */--}}
{{--        }--}}

{{--        .form-control:focus {--}}
{{--            border-color: #C0C0C0; /* Change border color on focus */--}}
{{--        }--}}

{{--        /* Animated border effect */--}}
{{--        .animated-border {--}}
{{--            position: absolute;--}}
{{--            bottom: 1;--}}
{{--            left: 1;--}}
{{--            right: 1;--}}
{{--            height: 3px;--}}
{{--            background-color: #C0C0C0;--}}
{{--            transform: scaleX(0); /* Initial scale to 0 */--}}
{{--            transform-origin: left; /* Expand from left to right */--}}
{{--            transition: transform 0.3s ease-in-out; /* Transition for animation */--}}
{{--        }--}}

{{--        .form-control:focus + .animated-border {--}}
{{--            transform: scaleX(5); /* Expand border to full width on focus */--}}
{{--        }--}}

{{--        .input-group {--}}
{{--            position: relative;--}}
{{--            color: #C0C0C0;--}}
{{--        }--}}

{{--        .input-icon {--}}
{{--            position: absolute;--}}
{{--            top: 50%;--}}
{{--            right: 0px;--}}
{{--            transform: translateY(-50%);--}}
{{--        }--}}

{{--        .fa-solid fa-envelope fa-beat {--}}
{{--            color: #555;--}}
{{--        }--}}

{{--        .fa-solid fa-lock fa-beat {--}}
{{--            color: #555;--}}
{{--        }--}}

{{--        .btn-primary {--}}
{{--            background-color: #FFFFFF;--}}
{{--            border: none;--}}
{{--            color: #000000;--}}
{{--            padding: 10px 20px;--}}
{{--            border-radius: 8px;--}}
{{--            cursor: pointer;--}}
{{--            font-size: 18px;--}}
{{--            transition: background-color 0.3s;--}}
{{--        }--}}

{{--        .btn-primary:hover {--}}
{{--            background-color: #000000;--}}
{{--            color: #FFFFFF;--}}

{{--        }--}}

{{--        .text-muted {--}}
{{--            color: #000000;--}}
{{--            font-size: 15px;--}}
{{--            margin-top: 20px;--}}
{{--        }--}}

{{--        .text-muted a {--}}
{{--            color: #000000;--}}
{{--            text-decoration: none;--}}
{{--        }--}}

{{--        .text-muted a:hover {--}}
{{--            text-decoration: underline;--}}
{{--        }--}}

{{--        .custom-alert {--}}
{{--            background-color: #FF5733; /* Change the background color */--}}
{{--            color: #FFFFFF; /* Change the text color */--}}
{{--            border: 1px solid #FF5733; /* Change the border color */--}}
{{--            padding: 5px; /* Add padding to the alert */--}}
{{--            border-radius: 5px; /* Add border radius for rounded corners */--}}
{{--            margin-top: 5px; /* Add margin to separate from other elements */--}}
{{--            margin-bottom: 10px;--}}
{{--            font-size: 15px; /* Adjust the font size */--}}
{{--}--}}

{{--    </style>--}}
{{--    <title>Sign in</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <form class="form-container" action="{{ route('form-container') }}" method="post">--}}
{{--        @csrf--}}
{{--        <h2>Sign in</h2>--}}
{{--        <div class="form-group">--}}
{{--            <label for="email">Email</label>--}}
{{--            <div class="input-group">--}}
{{--                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">--}}
{{--                <div class="animated-border"></div> <!-- Animated border element -->--}}
{{--                <div class="input-icon">--}}
{{--                <i class="fa-solid fa-envelope fa-beat"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="password">Password</label>--}}
{{--            <div class="input-group">--}}
{{--                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">--}}
{{--                <div class="animated-border"></div> <!-- Animated border element -->--}}
{{--                <div class="input-icon">--}}
{{--                <i class="fa-solid fa-lock fa-beat"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--            @if(session('error'))--}}
{{--            <div class="alert alert-danger custom-alert">--}}
{{--                {{ session('error') }}--}}
{{--            </div>--}}
{{--             @endif--}}

{{--        <button type="submit" class="btn btn-primary">Sign in</button>--}}
{{--        <p class="text-muted mt-3">Don't have an account? <a href="{{route('register')}}">Sign up here</a></p>--}}
{{--    </form>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="styles.css">

    <style>
        /* Add CSS styles to hide the table by default */
        #myStoreTable {
            display: none;
        }
    </style>

    <title>Signin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
</head>
<body>

<div class="container">
    <div class="row m-5 no-gutters shadow-lg">
        <div class="col-md-6 d-none d-md-block">
            <img src="https://img.freepik.com/free-vector/ecommerce-web-page-concept-illustration_114360-8204.jpg?w=900&t=st=1694803375~exp=1694803975~hmac=78af47a1399bf77457225b656d874130e10a0c2a798f1df63cb40178d1586f8f" class="img-fluid" style="min-height:100%;" />
        </div>
        <div class="col-md-6 bg-white p-5">
            <h3 class="pb-3">Signin</h3>
            <div class="form-style">
                <form action="{{ route('form-container') }}" method="post">
                    @csrf
                    <div class="form-group pb-3">
                        <input type="email" placeholder="Email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group pb-3">
                        <input type="password" placeholder="Password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>
                        <div><a href="#">Forget Password?</a></div>
                    </div>
                    <div class="pb-2">
                        <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Submit</button>
                    </div>
                </form>
                <div class="pt-4 text-center">
                    Get Members Benefit. <a href="{{route('register')}}">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
