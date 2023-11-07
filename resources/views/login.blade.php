<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- My CSS -->
    <link rel="stylesheet" href="styles.css">

    <style>
        /* Add CSS styles to hide the table by default */
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
            /* Add your mobile-specific styles here */

            body {
                font-size: 16px; /* Adjust font size for better readability on smaller screens */
            }

            .container {
                padding: 20px; /* Add some spacing around the container */
            }

            .col-md-6 {
                width: 100%; /* Make columns take up full width on mobile */
                padding: 15px; /* Add padding to columns */
            }

            .form-control {
                border-radius: 10px; /* Apply border-radius to form inputs */
            }

            /* Center align text inside the form inputs */
            input[type="email"],
            input[type="password"] {
                text-align: center;
            }

            /* Adjust spacing and font size for the "Remember Me" and "Forget Password" links */
            .d-flex.align-items-center.justify-content-between {
                flex-direction: column;
                align-items: center;
            }

            /* Adjust spacing for the submit button */
            .btn {
                margin-top: 20px;
            }

            /* Center align text for the "Get Members Benefit" link */
            .pt-4.text-center {
                text-align: center;
            }
        }

        /* Custom styles for the "Signin" page */
        .container {
            background-color: #f5f5f5; /* Background color for the form container */
            border-radius: 15px; /* Rounded corners for the form container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle depth effect */
            margin-top: 20px;
        }

        .col-md-6.bg-white {
            background-color: #fff; /* Background color for the form content */
            border-radius: 15px; /* Rounded corners for the form content */
            padding: 30px; /* Add padding to the form content */
        }

        h3 {
            color: #333; /* Text color for the form title */
        }

        .alert {
            margin-top: 20px; /* Adjust spacing for alerts */
        }

        /* Custom styles for the submit button */
        .btn-submit {
            border-radius: 10px;
            background-color: #007bff; /* Blue button color */
            color: #fff; /* Text color */
        }

        .show-password-label {
            cursor: pointer;
        }

        /* Additional custom styles can be added here */
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

            @if ($errors->has('error'))
                <div class="alert alert-danger">
                    {{ $errors->first('error') }}
                </div>
            @endif

            <div class="form-style">
                <form action="{{ route('form-container') }}" method="post">
                    @csrf
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
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>
                        <div><a href="forget">Forget Password?</a></div>
                    </div>
                    <div class="pb-2">
                        <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2 btn-submit" id="submitBtn">
                            <span class="submit-text">Submit</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <span class="sr-only">Loading...</span>
                        </button>
                    </div>
                </form>
                <div class="pt-4 text-center">
                    Get Members Benefit. <a href="{{route('register')}}">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>

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
