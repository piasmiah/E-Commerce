<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .invoice {
            padding: 20px;
            background: #f8f9fa;
            margin: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-table th, .invoice-table td {
            padding: 10px;
            border: 1px solid #dee2e6;
        }
        .total {
            text-align: right;
        }
    </style>
    <title>Company Name - Invoice</title>
</head>
<body>
<div class="invoice">
    <div class="invoice-header">
        <h2>Invoice</h2>
        <p>Company Name</p>
        <p>123 Company Street, Cityville, State</p>
        <p>Phone: (123) 456-7890</p>
        <p>Email: info@example.com</p>
    </div>
    <div class="row">
        <div class="col-md-6">

                <h4>User Information</h4>
                <p><strong>Name:</strong> {{ $user2->user_name }}</p>
                <p><strong>User ID:</strong> {{ $user2->user_id }}</p>
                <p><strong>Phone Number:</strong> {{$user2->Phone}}</p>

        </div>
        <div class="col-md-6">
            <h4>Shipping Address</h4>
            <p><strong>Address:</strong> 123 Main St, Cityville, State</p>
            <p><strong>Zip Code:</strong> 12345</p>
        </div>
    </div>
    <table class="invoice-table">
        <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @php
            $total = 0; // Initialize total variable
        @endphp
        @foreach($user as $purchase)
        <tr>
            <td>{{$purchase->products}}</td>
            <td>{{$purchase->Quantity}}</td>
            <td>{{$purchase->Unit_Price}}</td>
            <td>{{$purchase->Price}}</td>
        </tr>
        @php
            // Add the current product's price to the total
            $total += $purchase->Price;
        @endphp
        @endforeach
        <tr>
            <td colspan="3" class="total">Total:</td>
            <td>Tk. {{ $total }}</td>
        </tr>
        </tbody>
    </table>
    <div class="text-center">
        <button class="btn btn-primary">Pay Now</button>
    </div>

</div>
</body>
</html>
