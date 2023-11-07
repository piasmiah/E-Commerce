<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <!-- Add your custom CSS here -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
    <style>
        /* Add CSS styles to hide the table by default */
        .show-password-label {
            cursor: pointer;
        }
        #myStoreTable {
            display: none;
        }

        /* General styling for form elements */
        .form-control {
            border-radius: 10px;
            padding: 10px;
        }

        /* Responsive styling for smaller screens */
        @media (max-width: 768px) {
            .form-control {
                padding: 8px;
                border-radius: 6px;
            }

            .container {
                padding: 10px;
            }
        }

        /* Custom styles for the form container */
        .container {
            background-color: #f5f5f5; /* Background color for the form container */
            border-radius: 15px; /* Rounded corners for the form container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle depth effect */
            margin-top: 20px;
        }

        /* Custom styles for the submit button */
        .btn-submit {
            border-radius: 10px;
            background-color: #007bff; /* Blue button color */
            color: #fff; /* Text color */
        }

        /* Additional custom styles can be added here */
    </style>
    <title>Signup</title>
</head>
<body>

<div class="container">
    <div class="row m-3 no-gutters shadow-lg">
        <div class="col-md-6 d-none d-md-block">
            <img src="https://img.freepik.com/free-vector/ecommerce-web-page-concept-illustration_114360-8204.jpg?w=900&t=st=1694803375~exp=1694803975~hmac=78af47a1399bf77457225b656d874130e10a0c2a798f1df63cb40178d1586f8f" class="img-fluid" style="min-height:100%;" />
        </div>
        <div class="col-md-6 bg-white p-5">
            <h3 class="pb-3">Signup</h3>

            @if(session()->has('messages'))
                <div class="alert alert-danger">
                    @foreach(session('messages') as $message)
                        {{ $message }}<br>
                    @endforeach
                </div>
            @endif
            <div class="form-style">
                <form action="{{ route('insertion') }}" method="post">
                    @csrf
                    <div class="form-group pb-3">
                        <input type="text" placeholder="Name" name="names" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group pb-3">
                        <input type="text" placeholder="Mobile Number" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group pb-3">
                        <input type="text" placeholder="NID Number" name="nid" class="form-control" id="nid" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group pb-3">
                        <input type="email" placeholder="Email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group pb-3">
                        <input type="password" placeholder="Password" name="password" class="form-control" id="exampleInputPassword1" required>
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="showPassword">
                            <label class="form-check-label show-password-label" for="showPassword">Show Password</label>
                        </div>
                    </div>
                    <div class="form-group pb-3">
                        <input type="password" placeholder="Confirm Password" name="confirm-password" class="form-control" id="exampleInputConfirmPassword1" required>
                    </div>
                    <div class="pb-2">
                        <button id="submitBtn" type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">
                            <span class="submit-text">Register</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <span class="sr-only">Loading...</span>
                        </button>
                    </div>
                </form>
                <div class="pt-4 text-center">
                    Already have an account? <a href="{{route('login')}}">Signin</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#submitBtn").click(function (event) {
            // Prevent the form from being submitted
            event.preventDefault();

            // Toggle the visibility of the spinner and submit text
            $(".spinner-border").toggleClass("d-none");
            $(".submit-text").toggleClass("d-none");

            // Simulate a delay (e.g., AJAX request) before form submission
            setTimeout(function () {
                // You can add your form submission code here if needed
                // For demonstration purposes, we'll simply submit the form after a delay
                $("form").submit();
            }, 1000); // Adjust the delay as needed
        });
    });
    $("#showPassword").change(function () {
        var passwordField = $("#exampleInputPassword1");
        if ($(this).is(":checked")) {
            passwordField.attr("type", "text");
        } else {
            passwordField.attr("type", "password");
        }
    });
</script>
</body>
</html>
