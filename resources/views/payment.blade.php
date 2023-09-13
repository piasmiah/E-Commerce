<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .payment-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .payment-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .payment-container h3 {
            color: #555;
            margin-bottom: 20px;
        }
        .payment-form label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .custom-radio .custom-control-label::before {
            border-radius: 50%;
            border: 2px solid #3498db;
        }
        .custom-radio .custom-control-input:checked ~ .custom-control-label::before {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="container payment-container">
    <h2 class="text-center">Payment Details</h2>
    <h3 class="text-center">Your Total Price: {{$total}} Tk</h3>
    <input type="hidden" name="id" value="{{$user->id}}">
    <form class="payment-form" action="{{ route('donepayment',['id'=>$user->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="paymentMethod">Select Payment Method</label>

            <div class="custom-control custom-radio">
                <input type="radio" id="cardPayment" name="paymentMethod" class="custom-control-input" value="card" required>
                <label class="custom-control-label" for="cardPayment">Credit/Debit Card</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="codPayment" name="paymentMethod" class="custom-control-input" value="cod" required>
                <label class="custom-control-label" for="codPayment">Cash on Delivery</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="bkashPayment" name="paymentMethod" class="custom-control-input" value="bkash" required>
                <label class="custom-control-label" for="bkashPayment">bKash</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="nagadPayment" name="paymentMethod" class="custom-control-input" value="nagad" required>
                <label class="custom-control-label" for="nagadPayment">Nagad</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="rocketPayment" name="paymentMethod" class="custom-control-input" value="rocket" required>
                <label class="custom-control-label" for="rocketPayment">Rocket</label>
            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-block">Continue</button>
    </form>
</div>
</body>
</html>
