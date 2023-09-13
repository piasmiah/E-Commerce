<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Navbar styles */
        .navbar {
            margin-bottom: 30px;
        }

        .navbar-brand {
            font-size: 24px;
        }

        .navbar-nav .nav-link {
            font-size: 18px;
            color: white;
        }

        /* Product card styles */
        .card {
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            color: #888;
        }

        /* Add to Cart button styles */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .hidden{
            display: none;
        }
    </style>
    <title>E-Commerce Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<header class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart',['id' => $user->id]) }}">{{$total}} Cart</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('dashboard', ['id' => $user->id]) }}" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        {{ $user->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('purchase',['id'=>$user->id]) }}">
                                Purchase History
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/">
                                Logout
                            </a>
                        </li>
                        <!-- Add more dropdown items as needed -->
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</header>

<div class="container mt-5">


    <div class="row">
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="user_name" value="{{ $user->name }}">
        @foreach($product as $pro)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $pro->pro_pic) }}" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$pro->pro_id}}">
                        <h5 class="card-title">{{ $pro->pro_name }}</h5>
                        <h5 class="card-title">{{ $pro->pro_des }}</h5>
                        <p class="card-text">Tk. {{ $pro->price }}</p>
                        <a href="{{ route('product', ['id' => $pro->pro_id,'ids'=>$user->id]) }}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
