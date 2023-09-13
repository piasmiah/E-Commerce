<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Product Details</title>
    <style>
        .product-card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
        }
        .product-card h2 {
            margin-top: 0;
        }
        .product-card button {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <form action="{{ route('insertorder',['id' => $user->id]) }}" method="post">
            @csrf
        <div class="col-md-6">
            <div class="product-card">
                <input type="hidden" name="id" value="{{$user->id}}">
                <input type="hidden" name="name" value="{{$user->name}}">
                <input type="hidden" name="ids" value="{{$show->pro_id}}">
                <h2>{{$show->pro_name}}</h2>
                <input type="hidden" name="pro_name" value="{{$show->pro_name}}">
                <p>{{$show->pro_des}}</p>
                <p>Price: {{$show->price}}</p>
                <label>Location:</label>
                <input type="text" name="loc">
                <input type="hidden" name="status" value="Pending">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="0" class="form-control mb-2">
                <label for="totalPriceInput">Total Price:</label>
                <input type="number" id="totalPriceInput" name="total_price" class="form-control mb-2">
                <button class="btn btn-primary">Add to Cart</button>
            </div>
        </div>
        </form>
    </div>

    <script>
        const price = {{$show->price}};
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('totalPriceInput');

        quantityInput.addEventListener('input', updateTotalPrice);

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value);
            const totalPrice = price * quantity;
            totalPriceInput.value = totalPrice;
        }
    </script>





</div>
</body>
</html>
