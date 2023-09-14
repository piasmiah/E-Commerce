{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Dashboard</title>--}}
{{--    <!-- Include Bootstrap CSS -->--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <h1>Welcome to your Dashboard, {{$user->name}}!</h1>--}}


{{--    <h2>You have {{ $total }} products in your cart.</h2>--}}

{{--    <h3>Your Cart</h3>--}}

{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}

{{--            <th>Order ID</th>--}}
{{--            <th>Product ID</th>--}}
{{--            <th>Product Name</th>--}}
{{--            <th>Quantity</th>--}}
{{--            <th>Price</th>--}}
{{--            <th>Stauts</th>--}}
{{--            <th>Delete</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @php--}}
{{--        $total = 0;--}}
{{--        @endphp--}}
{{--        @foreach ($orders as $cartItem)--}}
{{--            <form action="{{ route('delete',['id'=>$user->id,'order_id' => $cartItem->order_id]) }}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="hidden" name="name" value="{{$user->name}}">--}}
{{--                <input type="hidden" name="id" value="{{$user->id}}">--}}
{{--            <tr>--}}

{{--                <td>{{ $cartItem->order_id }}</td>--}}
{{--                <input type="hidden" name="orid" value="{{$cartItem->order_id}}">--}}
{{--                <td>{{ $cartItem->product_id }}</td>--}}
{{--                <td>{{ $cartItem->products }}</td>--}}
{{--                <td>--}}
{{--                    {{ $cartItem->Quantity }}--}}
{{--                </td>--}}
{{--                <td>{{ $cartItem->Price }}</td>--}}

{{--                <td>--}}
{{--                    {{ $cartItem->order_status }}--}}
{{--                </td>--}}
{{--                <td><button type="submit">Delete</button></td>--}}


{{--            </tr>--}}
{{--            @php      $total +=   $cartItem->Price;        @endphp--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--        <tfoot>--}}
{{--        <tr>--}}
{{--            <th colspan="5">Total Price</th>--}}
{{--            <th>{{$total}}</th>--}}
{{--            <th></th>--}}
{{--        </tr>--}}
{{--        </tfoot>--}}
{{--    </table>--}}
{{--    </form>--}}

{{--    <div class="row mt-4">--}}
{{--        <div class="col-md-6">--}}
{{--            <h3>Payment with:</h3>--}}
{{--            <form action="{{ route('payment',['id'=>$user->id]) }}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="hidden" name="id" value="{{$user->id}}">--}}
{{--                @foreach ($orders as $cartItem)--}}

{{--                    <input type="hidden" name="orid" value="{{$cartItem->order_id}}">--}}
{{--                @endforeach--}}
{{--                <div class="payment-options">--}}
{{--                    <label>--}}
{{--                        <input type="radio" name="payment_option" value="credit_card">--}}
{{--                        Credit Card--}}
{{--                    </label>--}}
{{--                    <br>--}}
{{--                    <label>--}}
{{--                        <input type="radio" name="payment_option" value="Bkash">--}}
{{--                        Bkash--}}
{{--                    </label>--}}
{{--                    <br>--}}
{{--                    <label>--}}
{{--                        <input type="radio" name="payment_option" value="Nagad">--}}
{{--                        Nagad--}}
{{--                    </label>--}}
{{--                    <!-- Add more payment options here -->--}}
{{--                </div>--}}
{{--                <button type="submit">Submit</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}



{{--</div>--}}

{{--<!-- Include Bootstrap JS -->--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--</body>--}}
{{--</html>--}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @page {
            size: A4;
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

        @media print {
            .no-print {
                display: none;
            }
            .row {
                display: block;
            }
            .col-md-6 {
                width: 100%;
                float: none;
            }
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
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>User ID:</strong> {{ $user->id }}</p>
            <p><strong>Phone Number:</strong> (123) 456-7890</p>

        </div>
        <div class="col-md-6">
            <h4>Shipping Address</h4>
            <p><strong>Address:</strong> {{$loc->location}}</p>
        </div>
    </div>
    <table class="invoice-table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Stauts</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @php
            $total = 0; // Initialize total variable
        @endphp

        @foreach ($orders as $cartItem)
                    <form action="{{ route('delete',['id'=>$user->id,'order_id' => $cartItem->order_id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="name" value="{{$user->name}}">
                        <input type="hidden" name="id" value="{{$user->id}}">
                    <tr>

                        <td>{{ $cartItem->order_id }}</td>
                        <input type="hidden" name="orid" value="{{$cartItem->order_id}}">
                        <td>{{ $cartItem->product_id }}</td>
                        <td>{{ $cartItem->products }}</td>
                        <td>
                            {{ $cartItem->Quantity }}
                        </td>
                        <td>{{ $cartItem->Price }}</td>

                        <td>
                            {{ $cartItem->order_status }}
                        </td>
                        <td>
                            @if ($cartItem)
                                <!-- Check if payment is completed -->
                                @if ($cartItem->Payment_Status !== 'paid')
                                    <button type="submit">Delete</button>
                                @endif
                            @endif
                        </td>


                    </tr>
                    @php      $total +=   $cartItem->Price;        @endphp
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="5">Total Price</th>
                    <th>{{$total}}</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
            </form>
    <div class="text-center no-print">
        @php
            $paymentCompleted = true;
            foreach ($paymentstatus as $orderStatus) {
                if ($orderStatus->Payment_Status !== 'paid') {
                    $paymentCompleted = false;
                     // No need to continue checking
                     break;
                }
                
            }
        @endphp

        @if ($paymentCompleted)
            <p>Payment has been successfully completed.</p>
            <button class="btn btn-secondary" onclick="printInvoice()">Print Invoice</button>
        @else
            <a href="{{ route('payment',['id'=>$user->id]) }}" class="btn btn-primary">Pay now</a>
        @endif
    </div>

</div>

<script>
    function printInvoice() {
        window.print();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
