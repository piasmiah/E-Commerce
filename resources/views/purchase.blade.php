<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 30px;
        }

        .product-image {
            max-width: 50px;
            max-height: 50px;
            border-radius: 50%; /* Add this line to make the image round */
        }

        table {
            background-color: #fff;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .product-image {
            max-width: 50px; /* Adjust the width as needed */
            max-height: 50px; /* Adjust the height as needed */
        }
    </style>
    <title>Order History</title>
</head>
<body>
<div class="container">
    <h1>Order History</h1>
    <table>
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($see as $saw)
        <tr>
            <input type="hidden" name="id" value="{{$saw->product_id}}">
            <td>{{$saw->order_id}}</td>
            <td>{{$saw->products}}</td>
            <td><img src="{{ asset('storage/' . $saw->pro_pic) }}" class="product-image" width="50" height="50"></td>

            <td>{{$saw->Price}}</td>
            <td>{{$saw->Date}}</td>

        </tr>
        @endforeach

        <!-- Add more rows for each order -->
        </tbody>
    </table>
</div>
</body>
</html>
