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
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-style">
                <form action="{{ route('form-container') }}" method="post">
                    @csrf
                    <div class="form-group pb-3">
                        <input type="email" placeholder="Email" name="email" class="form-control" id="exampleInputEmail1" style="border-radius: 10px;" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group pb-3">
                        <input type="password" placeholder="Password" name="password" class="form-control" style="border-radius: 10px;" id="exampleInputPassword1" required>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>
                        <div><a href="forget">Forget Password?</a></div>
                    </div>
                    <div class="pb-2">
                        <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2" style="border-radius: 10px;">Submit</button>
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
