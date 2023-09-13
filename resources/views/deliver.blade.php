<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Order</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar">
    <div class="container">

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="/">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">
    <h1>Shipping Order</h1>
    <form action="{{ route('pending') }}" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="search_location" class="form-control" placeholder="Search by Location">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Order Id</th>
            <th scope="col">Customer Id</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Location</th>
            <th scope="col">Product Id</th>
            <th scope="col">Products</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
            <th scope="col">Invoice</th>

        </tr>
        </thead>
        <tbody>
        @foreach($order as $oder)
            <tr>
                <form action="{{ route('update') }}" method="post">
                    @csrf
                    <th><input type="checkbox" name="selected_orders[]" value="{{ $oder->order_id }}"></th>
                    <th scope="row">{{$oder->order_id}}</th>
                    <input type="hidden" name="id" value="{{$oder->order_id}}">
                    <th scope="row">{{$oder->customer_id}}</th>
                    <input type="hidden" name="ids" value="{{$oder->customer_id}}">
                    <td>{{$oder->customer_name}}</td>
                    <td>{{$oder->location}}</td>
                    <th scope="row">{{$oder->product_id}}</th>
                    <input type="hidden" name="pro_id" value="{{$oder->product_id}}">
                    <td>{{$oder->products}}</td>
                    <td>{{$oder->Quantity}}</td>
                    <input type="hidden" name="quan" value="{{$oder->Quantity}}">
                    <td>{{$oder->Price}}</td>
                    <td><button type="submit">{{$oder->order_status}}</button></td>
                    <input type="hidden" name="status" value="Delivered">
                </form>

            </tr>

        @endforeach
        </tbody>
    </table>

</div>

<!-- Include Bootstrap JS (Optional, for enhanced functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
