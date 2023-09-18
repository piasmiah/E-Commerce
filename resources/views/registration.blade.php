{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <script src="https://kit.fontawesome.com/0b1902fdb8.js" crossorigin="anonymous"></script>--}}
{{--    <style>--}}
{{--        /* Global styles */--}}
{{--        body {--}}
{{--            font-family: Arial, sans-serif;--}}
{{--            background-color: #FFFFFF;--}}
{{--            margin: 0;--}}
{{--            padding: 0;--}}
{{--            display: flex;--}}
{{--            justify-content: center;--}}
{{--            align-items: center;--}}
{{--            min-height: 100vh;--}}
{{--        }--}}

{{--        .container {--}}
{{--            background-color: #FED8B1;--}}
{{--            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);--}}
{{--            border-radius: 8px;--}}
{{--            width: 400px;--}}
{{--            padding: 30px;--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        h2 {--}}
{{--            color: #333;--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}

{{--        .form-group {--}}
{{--            margin-bottom: 20px;--}}
{{--            text-align: left;--}}
{{--        }--}}

{{--        .form-control {--}}
{{--            width: 95%;--}}
{{--            padding: 10px;--}}
{{--            border: 5px solid transparent;--}}
{{--            border-radius: 10px;--}}
{{--            font-size: 15px;--}}
{{--            position: relative;--}}
{{--            transition: border-color 0.3s; --}}
{{--        }--}}

{{--        .form-control:focus {--}}
{{--            border-color: #C0C0C0;--}}
{{--        }--}}

{{--        /* Animated border effect */--}}
{{--        .animated-border {--}}
{{--            position: absolute;--}}
{{--            bottom: 0;--}}
{{--            left: 0;--}}
{{--            width: 100%;--}}
{{--            height: 2px;--}}
{{--            background-color: #C0C0C0;--}}
{{--            transform: scaleX(0); /* Initial scale to 0 */--}}
{{--            transform-origin: left; /* Expand from left to right */--}}
{{--            transition: transform 0.3s ease-in-out; /* Transition for animation */--}}
{{--        }--}}

{{--        .form-control:focus + .animated-border {--}}
{{--            transform: scaleX(1); /* Expand border to full width on focus */--}}
{{--        }--}}

{{--        .btn-primary {--}}
{{--             background-color: #FFFFFF;--}}
{{--            border: none;--}}
{{--            color: #000000;--}}
{{--            padding: 10px 20px;--}}
{{--            border-radius: 8px;--}}
{{--            cursor: pointer;--}}
{{--            font-size: 18px;--}}
{{--            transition: background-color 0.3s;--}}
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
{{--        .fa-solid fa-user fa-beat {--}}
{{--            color: #555;--}}
{{--        }--}}
{{--        .fa-solid fa-envelope fa-beat {--}}
{{--            color: #555;--}}
{{--        }--}}
{{--        .fa-solid fa-lock fa-beat {--}}
{{--            color: #555;--}}
{{--        }--}}

{{--        .btn-primary:hover {--}}
{{--             background-color: #000000;--}}
{{--            color: #FFFFFF;--}}
{{--        }--}}

{{--        .text-muted {--}}
{{--            color: #000000;--}}
{{--            font-size: 15px;--}}
{{--            margin-top: 20px;--}}
{{--        }--}}

{{--        .text-muted a {--}}
{{--            text-decoration: none;--}}
{{--            color: #000000;--}}
{{--        }--}}

{{--        .text-muted a:hover {--}}
{{--            text-decoration: underline;--}}
{{--        }--}}
{{--    </style>--}}
{{--    <title>Sign up</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <form action="{{ route('insertion') }}" method="post" class="form-container">--}}
{{--        @csrf--}}
{{--        <h2>Sign up</h2>--}}
{{--        <div class="form-group">--}}
{{--            <label for="name">Full Name</label>--}}
{{--            <div class="input-group">--}}
{{--                <input type="text" id="name" name="names" class="form-control" placeholder="Enter full name" required>--}}
{{--                <div class="animated-border"></div> <!-- Animated border element -->--}}
{{--                <div class="input-icon">--}}
{{--                <i class="fa-solid fa-user fa-beat"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="email">Email</label>--}}
{{--            <div class="input-group">--}}
{{--                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>--}}
{{--                <div class="animated-border"></div> <!-- Animated border element -->--}}
{{--                <div class="input-icon">--}}
{{--                <i class="fa-solid fa-envelope fa-beat"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="password">Password</label>--}}
{{--            <div class="input-group">--}}
{{--                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>--}}
{{--                <div class="animated-border"></div> <!-- Animated border element -->--}}
{{--                <div class="input-icon">--}}
{{--                <i class="fa-solid fa-lock fa-beat"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <button type="submit" class="btn btn-primary">Sign up</button>--}}
{{--        </form>--}}
{{--        <p class="text-muted mt-3">Already have an account? <a href="{{route('login')}}">Sign in here</a></p>--}}
{{--    --}}
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
            <h3 class="pb-3">Signup</h3>
            <div class="form-style">
                <form action="{{ route('insertion') }}" method="post">
                    @csrf
                    <div class="form-group pb-3">
                        <input type="text" placeholder="Name" name="names" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
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
                    Already have an account? <a href="{{route('login')}}">Signin</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
