<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .navbar {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;
        }



    </style>
    <title>Add Product</title>
</head>
<body>
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#" id="product-link">Product Management</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" id="table-link">Other Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container" id="product-container">
    <h2>Add Product</h2>
    <form class="product-form" action="{{ route('product-form') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Product Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" id="picture" name="picture" class="form-control-file" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
<div class="table hidden" id="table-container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product as $pro)
        <tr>
            <th scope="row">{{ $pro->pro_id }}</th>
            <td>{{ $pro->pro_name }}</td>
            <td>{{ $pro->category }}</td>
            <td>{{ $pro->price }}</td>
            <td><img src=" {{asset('storage/' .$pro->pro_pic)}}" alt="Product Image" width="250px" height="150px"></td>
        </tr>
        @endforeach
        <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

<script>
    const productLink = document.getElementById('product-link');
    const tableLink = document.getElementById('table-link');
    const productContainer = document.getElementById('product-container');
    const tableContainer = document.getElementById('table-container');

    productLink.addEventListener('click', function () {
        productContainer.classList.remove('hidden');
        tableContainer.classList.add('hidden');
    });

    tableLink.addEventListener('click', function () {
        productContainer.classList.add('hidden');
        tableContainer.classList.remove('hidden');
    });
</script>

</body>
</html>
