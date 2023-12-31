<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <script src="https://kit.fontawesome.com/a87236255f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/a87236255f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a87236255f.js" crossorigin="anonymous"></script>


    <title>AdminHub</title>
</head>
<style>

    .success-message {
        background-color: #4CAF50; /* Green background color */
        color: #fff; /* White text color */
        padding: 10px;
        width: 50%;
        overflow: hidden; /* Hide overflowing content */
        max-height: 0; /* Set a maximum height for the transition */
        transition: max-height 5s ease;/* Add some padding for better visibility */
    }


    select#category {
        width: 100%; /* Adjust the width as needed */
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    /* Style the selected option in the dropdown */
    select#category option:checked {
        background-color: #007bff; /* Background color for the selected option */
        color: #fff; /* Text color for the selected option */
    }

    /* Style the form input fields */
    .input-fields {
        margin-bottom: 15px;
    }

    .input-fields label {
        display: block;
        margin-bottom: 5px;
    }

    .input-fields input[type="text"],
    .input-fields select {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }


    /* Style the submit button */
    .btn-download {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-download:hover,
    .btn-download:focus {
        background-color: #0056b3;
    }
    input[type="date"] {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        /* Add your custom styles here */
    }

    input[type="text"] {
        width: 50%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    /* Style the image within the table cell */

    /* Add this CSS to your styles.css or within a <style> tag in your HTML file */
    table td button {
        background-color: #007bff; /* Button background color */
        color: #fff; /* Button text color */
        padding: 5px 10px; /* Adjust padding to your preference */
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Hover and focus styles for the button */
    table td button:hover,
    table td button:focus {
        background-color: #0056b3; /* Button background color on hover/focus */
    }

    a:hover{
        text-decoration: none;
    }

    /* You can add more specific styling if needed */

</style>
<body>


<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Admin</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="#dashboard" class="toggle-dashboard">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#mystore" class="toggle-table">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">My Store</span>
            </a>
        </li>
        <li>
            <a href="#orders" class="toggle-order">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Orders</span>
            </a>
        </li>
        <li>
            <a href="#" class="toggle-message">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Edit Products</span>
            </a>
        </li>
        <li>
            <a href="#" class="category">
                <i class='bx bx-plus'></i>
                <span class="text">Add Categories</span>
            </a>
        </li>
        <li>
            <a href="#" class="discount">
                <i class='bx bx-plus'></i>
                <span class="text">Discount Offer</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="/" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->



<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu' ></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>

        <a href="#" class="profile">
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <section id="dashboard">
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download' ></i>
                <span class="text">Download PDF</span>
            </a>
        </div>
            <form class="product-form" action="{{ route('product-form') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="input-fields">
                <label>Category</label>
                <select id="category" name="category">
                    <option value="-">Select</option>
                    @foreach($show as $ss)
                        <option value="{{$ss->Category_Name}}">{{$ss->Category_Name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-fields">
                <label>Name</label>
                <div>

                    <select id="product_name_select" name="product_name">
                        <option value="-">Select</option>
                        @foreach($product2 as $pro)
                            <option value="{{$pro->pro_name}}">{{$pro->pro_name}}</option>
                        @endforeach
                        <option value="other">Other</option>
                    </select>
                    <input type="text" name="custom_product_name" id="custom_product_name" placeholder="Enter product name" style="display: none;">
                </div>
            </div>


            <div class="input-fields">
                <label>Description</label>
                <input type="text" placeholder="Description" name="description">
            </div>


            <div class="input-fields">
                <label>Price</label>
                <input type="number" step="0.01" placeholder="Price" name="price">
            </div>
            <div class="input-fields">
                <label>Stock</label>
                <input type="number" placeholder="Stock" name="stock">
                <input type="hidden" name="status" value="Available">
            </div>

                <div class="input-fields">
                    <label>Products</label>
                    <select name = "products">
                        <option value ='LIVE'>LIVE</option>
                        <option value ='upcoming'>Upcoming</option>
                    </select>
                </div>


                <div class="input-fields">
                    <label>Coming Date</label>
                    <input type="date" placeholder="Price" name="date">
                </div>

            <div class="input-fields">
                <label>Picture</label>
                <input type="file" placeholder="Pictuer" name="picture" accept="image/*">
            </div>

            <button type="submit" class="btn-download">Submit</button>
            </form>
        </section>

        <section id="products" style="display: none">
            <div class="head-title">
                <div class="left">
                    <h1>My Store</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">My Store</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Products</h3>
                    @if($countLowStock > 0 )
                        <div style="border: 2px solid #000; padding: 10px; border-radius: 20px">
                            <i class="fa-solid fa-circle-info fa-beat" style="color: #24f109;"> </i>
                            {{$countLowStock}} {{ $countLowStock > 1 ? 'products' : 'product' }} {{ $countLowStock > 1 ? 'are' : 'is' }} out of reach.
                        </div>
                    @endif
                    @if($count>0)
                        <div style="border: 2px solid #000; padding: 10px; border-radius: 20px">
                            <i class="fa-solid fa-triangle-exclamation fa-beat" style="color: #f50000;"></i>
                            {{$count}} {{ $count > 1 ? 'products' : 'product' }} {{ $count > 1 ? 'are' : 'is' }} out of stock.<br>
                        </div>
                    @endif
                    </div>
                    <div class="input-fields">
                        <select id="categoryFilter">
                            <option value="all">All Categories</option>
                            @foreach($show as $ss)
                                <option value="{{$ss->Category_Name}}">{{$ss->Category_Name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <table>
                        <thead>
                        <tr>
                            <th>Pictuer</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Coming Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $pro)
                            @if($pro->date_status === 'upcoming')
                                <tr>
                                    <td><img src="{{asset('storage/' .$pro->pro_pic)}}"></td>
                                    <td>{{$pro->pro_name}}</td>
                                    <td>{{$pro->category}}</td>
                                    <td>{{ Str::limit($pro->pro_des, 30) }}</td>
                                    <td>{{$pro->Stock}}</td>
                                    <td>${{$pro->price}}</td>
                                    <td>{{$pro->Discount_Rate}}%</td>
                                    <td>{{$pro->date_status}}</td>
                                    <td id="{{$pro->upcoming_date}}"></td>
                                </tr>
                            @else
                                <tr style="background-color: {{ ($pro->Stock_Status == 'Out of Stock' && $pro->Stock == 0) ? '#FE3B01' : ($pro->Stock <= 2 ? '#24f109' : 'white') }}; color: {{ ($pro->Stock_Status == 'Out of Stock' && $pro->Stock == 0) ? 'white' : 'black' }}">
                                    <td><img src="{{asset('storage/' .$pro->pro_pic)}}"></td>
                                    <td>{{$pro->pro_name}}</td>
                                    <td>{{$pro->category}}</td>
                                    <td>{{ Str::limit($pro->pro_des, 30) }}</td>
                                    <td>{{$pro->Stock}}</td>
                                    <td>${{$pro->price}}</td>
                                    <td>{{$pro->Discount_Rate}}%</td>
                                    <td>{{$pro->date_status}}</td>
                                    <td>{{$pro->upcoming_date}}</td>
                                </tr>
                            @endif

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="orders" style="display: none">
            <div class="head-title">
                <div class="left">
                    <h1>Recent Orders</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Recent Orders</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Orders</h3>

                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Customer Id</th>
                            <th>Customer Name</th>
                            <th>Location</th>
                            <th>Product Id</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date of Order</th>
                            <th>Delivary Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $oder)
                            <tr>
                                <form action="{{ route('updatep') }}" method="post">
                                    @csrf
                                <td>{{$oder->order_id}}</td>
                                <input type="hidden" name="id" value="{{$oder->order_id}}">
                                <td>{{$oder->customer_id}}</td>
                                <input type="hidden" name="ids" value="{{$oder->customer_id}}">
                                    @php
                                        $nameParts = explode(' ', $oder->customer_name);
                                    @endphp
                                    <td>{{$nameParts[0]}} {{$nameParts[2] ?? ''}}</td>

                                <td>{{$oder->location}}</td>
                                <td>{{$oder->product_id}}</td>
                                <input type="hidden" name="pro_id" value="{{$oder->product_id}}">
                                <td>{{$oder->products}}</td>
                                <td>{{$oder->Quantity}}</td>
                                <input type="hidden" name="quan" value="{{$oder->Quantity}}">
                                <td>${{$oder->Price}}</td>
                                <td>{{ date('M d, Y', strtotime($oder->created_at)) }}</td>
                                    <td>

                                    @if($oder->order_status==='Delivered' || $oder->order_status==='Shipping' || $oder->order_status==='On the Way')

                                            {{$oder->Date}}
                                        @elseif($oder->Payment_Status==='paid')
                                        <input type="date" name="date" id="calendar" min="2023-01-01" max="2023-12-31">
                                        @endif
                                    </td>

                                @if($oder->order_status==='Delivered')
                                    <td><span class="status completed">{{$oder->order_status}}</span></td>
                                @elseif($oder->order_status==='Shipping')
                                    <td><span class="status pending">{{$oder->order_status}}</span></td>
                                @elseif($oder->Payment_Status==='On the Way')
                                    <td><span class="status process">{{$oder->order_status}}</span></td>
                                @elseif($oder->Payment_Status==='paid')
                                    <td><button type="submit" class="status process">{{$oder->order_status}}</button></td>
                                @endif
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="message" style="display: none">
            <div class="head-title">
                <div class="left">
                    <h1>My Store</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">My Store</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Products</h3>
                    </div>
                    <div class="input-fields">
                        <select id="categoryFilter2" onchange="filterTable()">
                            <option value="all2">All Categories</option>
                            @foreach($show as $ss)
                                <option value="{{$ss->Category_Name}}">{{$ss->Category_Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <table>
                        @php
                            $outOfStockProducts = $product->where('Stock_Status', 'Out of Stock');
                            $otherProducts = $product->where('Stock_Status', '!=', 'Out of Stock');
                        @endphp
                        <thead>
                        <tr>
                            <th>Pictuer</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Privious Price</th>
                            <th>Stock</th>
                            <th>New Price</th>
                            <th>Submit</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($outOfStockProducts as $pro)
                            <form method="post" action="{{route('updatepro')}}">
                                @csrf
                                <tr style="background-color: {{ $pro->Stock_Status == 'Out of Stock' ? '#FE3B01' : 'white' }}; color: {{ $pro->Stock_Status == 'Out of Stock' ? 'white' : 'black' }};">
                                    <td>
                                        <img src="{{ asset('storage/' . $pro->pro_pic) }}" alt="Product Image">
                                    </td>
                                    <input type="hidden" name="proid" value="{{$pro->pro_id}}">
                                    <td>
                                        <span class="category-name">{{$pro->pro_name}}</span>
                                        <input type="text" name="name" class="edit-input" style="display: none;">
                                    </td>
                                    <td>
                                        <span class="category-name2">{{$pro->category}}</span>
                                        <input type="text" name="category" class="edit-input2" style="display: none;">
                                    </td>

                                    <td>
                                        <span class="category-name3">{{ Str::limit($pro->pro_des, 30) }}</span>
                                        <span class="category-fullname" style="display:none;">{{ $pro->pro_des }}</span>
                                        <textarea type="text" name="descrip" class="edit-input3" style="display: none;"></textarea>
                                    </td>
                                    <td>
                                        <span class="category-name4">{{$pro->price}}</span>
                                        <input type="text" name="price" class="edit-input4" style="display: none;">
                                    </td>
                                    <td>
                                        <span class="category-name5">{{$pro->Stock}}</span>
                                        <input type="text" name="stock" class="edit-input6" style="display: none;">
                                    </td>
                                    <td>
                                        <input type="text" name="newprice" class="edit-input5" style="display: none;">
                                        <i class="fa-regular fa-pen-to-square edit-button"></i>
                                        <i class="fa-solid fa-xmark close-button" style="display: none;"></i>
                                    </td>
                                    <td>
                                        <button type="submit"><i class="fa-solid fa-check"></i></button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach

                        @foreach($otherProducts as $pro)
                            <form method="post" action="{{route('updatepro')}}" enctype="multipart/form-data">
                                @csrf
                                <tr style="background-color: {{ ($pro->Stock_Status == 'Out of Stock' && $pro->Stock == 0) ? '#FE3B01' : ($pro->Stock <= 2 ? '#24f109' : 'white') }}; color: {{ ($pro->Stock_Status == 'Out of Stock' && $pro->Stock == 0) ? 'white' : 'black' }}">
                                    <td>
                                        <input type="file" id="pro_image_{{ $pro->pro_id }}" name="pro_image"  class="edit-input8" style="display: none;">
                                        <img src="{{ asset('storage/' . $pro->pro_pic) }}" alt="Product Image">
                                    </td>
                                    <input type="hidden" name="proid" value="{{$pro->pro_id}}">
                                    <td>
                                        <span class="category-name">{{$pro->pro_name}}</span>
                                        <input type="text" name="name" class="edit-input" style="display: none;">
                                    </td>
                                    <td>
                                        <span class="category-name2">{{$pro->category}}</span>
                                        <input type="text" name="category" class="edit-input2" style="display: none;">
                                    </td>

                                    <td>
                                        <span class="category-name3">{{ Str::limit($pro->pro_des, 30) }}</span>
                                        <span class="category-fullname" style="display:none;">{{ $pro->pro_des }}</span>
                                        <textarea type="text" name="descrip" class="edit-input3" style="display: none;"></textarea>
                                    </td>
                                    <td>
                                        <span class="category-name4">{{$pro->price}}</span>
                                        <input type="text" name="price" class="edit-input4" style="display: none;">
                                    </td>
                                    <td>
                                        <span class="category-name5">{{$pro->Stock}}</span>
                                        <input type="text" name="stock" class="edit-input6" style="display: none;">
                                    </td>
                                    <td>
                                        <input type="text" name="newprice" class="edit-input5" style="display: none;">
                                        <i class="fa-regular fa-pen-to-square edit-button"></i>
                                        <i class="fa-solid fa-xmark close-button" style="display: none;"></i>
                                    </td>
                                    <td>
                                        <button type="submit"><i class="fa-solid fa-check"></i></button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="addcategory" style="display: none">
            <div class="head-title">
                <div class="left">
                    <h1>Add Category</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Add Category</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <form class="product-form" action="{{route('ctegory')}}" method="post">
                @csrf
                <div class="input-fields">
                    <label>Name</label>
                    <input type="text" placeholder="Enter Category" name="category">
                </div>

            <button type="submit" class="btn-download">Submit</button>
            </form>
            @if(session('success'))
                <div class="success-message alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Category</h3>
                    </div>

                    <table>
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                            <th></th>
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($show as $shop)
                            <form action="updateCata" method="post">
                                @csrf
                            <tr>
                                <td>{{$shop->SL_No}}</td>
                                <input type="hidden" name="id" value="{{$shop->SL_No}}">
                                <td>
                                    <span class="category-name">{{$shop->Category_Name}}</span>
                                    <input type="text" name="edit" class="edit-input" style="display: none;">

                                </td>
                                <td>
                                    <i class="fa-regular fa-pen-to-square edit-button"></i>
                                    <i class="fa-solid fa-xmark close-button" style="display: none;"></i>
                                </td>
                                <td>
                                    <button type="submit"><i class="fa-solid fa-check"></i></button>
                                </td>
                            </tr>
                            </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="creatediscount" style="display: none">
            <div class="head-title">
                <div class="left">
                    <h1>My Store</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">My Store</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Discount</h3>

                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Discount Rate</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Activate</th>
                        </tr>
                        </thead>
                        <tbody>

                            <form method="post" action="{{ route('discount') }}" id="myForm">
                                @csrf
                            <tr class="input-fields">
                                <td>
                                <select name="category" style="width: 60%;">
                                    <option value="-">Select</option>
                                    @foreach($show as $ss)
                                        <option value="{{$ss->Category_Name}}">{{$ss->Category_Name}}</option>
                                    @endforeach
                                </select>
                                </td>
                                <td> <input type="number" name="discount" style="width: 50%; border-radius: 5px;"></td>
                                <td><input type="date" name="startdate" style="width: 70%; border-radius: 5px;"></td>
                                <td>
                                    <input type="datetime-local" name="enddate" style="width: 70%; border-radius: 5px;">
                                </td>
                                <td>
                                    <button type="submit" name="radioOption" value="On">Update</button>
                                </td>
                            </tr>
                            </form>

                        </tbody>
                    </table>

                    <table>
                        <thead>
                        <th>SL_NO</th>
                            <th>Name</th>
                            <th>Discount Rate</th>
                            <th>End Date</th>
                            <th>Active/Deactive</th>
                        </thead>
                        <tbody>
                        <form method="post" action="{{ route('updatediscount') }}">
                            @csrf
                            @foreach($get as $gets)
                            <tr>
                                <td>
                                    {{$gets->ID}}
                                    <input type="hidden" name="ID" value="{{$gets->ID}}">
                                </td>
                                <td>
                                    {{$gets->Name}}
                                </td>
                                <td>
                                    {{$gets->Discount_Rate}}
                                </td>
                                <td>
                                    {{$gets->End_Date}}
                                </td>
                                <td>
                                    <button type="submit" value="Off" name="radioOption">{{$gets->Activate}}</button>
                                </td>
                            </tr>
                            @endforeach
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/links.js')}}"></script>
<script>
    function submitForm() {
        document.getElementById("myForm").submit();
    }

    const showButtons = document.querySelectorAll(".show-newprice");

    // Attach click event listener to each "Show" button
    showButtons.forEach(button => {
        button.addEventListener("click", function() {
            // Find the corresponding "newprice" input field
            const newpriceInput = this.parentElement.querySelector(".newprice");

            // Toggle the visibility of the "newprice" input field
            if (newpriceInput.style.display === "none") {
                newpriceInput.style.display = "inline-block";
                this.textContent = "Hide";
            } else {
                newpriceInput.style.display = "none";
                this.textContent = "Show";
            }

            // Enable or disable the "newprice" input based on visibility
            newpriceInput.disabled = newpriceInput.style.display === "none";
        });
    });

    // Attach submit event listener to the form
    const form = document.querySelector("form.product-form");
    form.addEventListener("submit", function() {
        // Find the "newprice" input field within the form
        const newpriceInput = form.querySelector(".newprice");

        // If the "newprice" input is hidden, disable it
        if (newpriceInput.style.display === "none") {
            newpriceInput.disabled = true;
        }
    });
    $(document).ready(function() {
        $('.edit-button').on('click', function() {
            var $row = $(this).closest('tr');
            var $categoryName = $row.find('.category-name');
            var $categoryName2 = $row.find('.category-name2');
            var $categoryName3 = $row.find('.category-name3');
            var $categoryName4 = $row.find('.category-name4');
            var $categoryName5 = $row.find('.category-name5');
            var $categoryFullName = $row.find('.category-fullname');
            var $editInput = $row.find('.edit-input');
            var $editInput2 = $row.find('.edit-input2');
            var $editInput3 = $row.find('.edit-input3');
            var $editInput4 = $row.find('.edit-input4');
            var $editInput5 = $row.find('.edit-input5');
            var $editInput6 = $row.find('.edit-input6');
            var $editInput8 = $row.find('.edit-input8');
            var $editButton = $row.find('.edit-button');
            var $closeButton = $row.find('.close-button');

            $categoryName.toggle();
            $categoryName2.toggle();
            $categoryName3.hide();
            $categoryName4.toggle();
            $categoryName5.toggle();
            $categoryFullName.hide();
            $editInput.toggle();
            $editInput2.toggle();
            $editInput3.toggle();
            $editInput4.toggle();
            $editInput5.toggle();
            $editInput6.toggle();
            $editInput8.toggle();
            $editButton.hide();
            $closeButton.show();

            // Copy the category name to the input field for editing
            $editInput.val($categoryName.text());
            $editInput2.val($categoryName2.text());
            $editInput3.val($categoryFullName.text());
            $editInput4.val($categoryName4.text());
            $editInput6.val($categoryName5.text());
        });

        $('.close-button').on('click', function() {
            var $row = $(this).closest('tr');
            var $categoryName = $row.find('.category-name');
            var $categoryName2 = $row.find('.category-name2');
            var $categoryName3 = $row.find('.category-name3');
            var $categoryName4 = $row.find('.category-name4');
            var $categoryName5 = $row.find('.category-name5');
            var $categoryFullName = $row.find('.category-fullname');
            var $editInput = $row.find('.edit-input');
            var $editInput2 = $row.find('.edit-input2');
            var $editInput3 = $row.find('.edit-input3');
            var $editInput4 = $row.find('.edit-input4');
            var $editInput5 = $row.find('.edit-input5');
            var $editInput6 = $row.find('.edit-input6');
            var $editInput8 = $row.find('.edit-input8');
            var $editButton = $row.find('.edit-button');
            var $closeButton = $row.find('.close-button');

            $categoryName.toggle();
            $categoryName2.toggle();
            $categoryName3.show();
            $categoryName4.toggle();
            $categoryName5.toggle();
            $categoryFullName.hide();
            $editInput.toggle();
            $editInput2.toggle();
            $editInput3.toggle();
            $editInput4.toggle();
            $editInput5.toggle();
            $editInput6.toggle();
            $editInput8.toggle();
            $editButton.show();
            $closeButton.hide();
        });
    });
    $(document).ready(function() {
        // Check if the success message exists
        var successMessage = $('.success-message');

        if (successMessage.length > 0) {
            // Set the max-height to a value that allows the message to expand
            successMessage.css('max-height', '100px');

            // Delay for 5 seconds before hiding the message
            setTimeout(function() {
                // Set the max-height back to 0 to trigger the transition
                successMessage.css('max-height', '0');

                // After the transition, hide the message
                successMessage.on('transitionend', function() {
                    successMessage.hide();
                });
            }, 5000);
        }
    });

    document.getElementById('categoryFilter').addEventListener('change', function () {
        const selectedCategory = this.value;
        const tableRows = document.querySelectorAll('tbody tr');

        tableRows.forEach(function (row) {
            const categoryCell = row.querySelector('td:nth-child(3)'); // Assuming category is in the 3rd cell
            if (selectedCategory === 'all' || categoryCell.textContent === selectedCategory) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });

    function filterTable() {
        var selectedCategory = $("#categoryFilter2").val();

        // Hide all table rows first
        $("table tbody tr").hide();

        if (selectedCategory === "all2") {
            // Show all rows if "All Categories" is selected
            $("table tbody tr").show();
        } else {
            // Show rows with matching category
            $("table tbody tr").each(function () {
                var category = $(this).find(".category-name2").text();
                if (category === selectedCategory) {
                    $(this).show();
                }
            });
        }
    }

    document.getElementById('product_name_select').addEventListener('change', function () {
        const select = this;
        const customProductNameInput = document.getElementById('custom_product_name');

        if (select.value === 'other') {
            customProductNameInput.style.display = 'block';
            // customProductNameInput.setAttribute('name', 'custom_product_name');
        } else {
            customProductNameInput.style.display = 'none';
            // customProductNameInput.setAttribute('name', 'product_name');
        }
    });

</script>

</body>
</html>
