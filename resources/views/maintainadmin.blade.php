<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <title>AdminHub</title>
</head>
<body>


<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Admin</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="#" class="toggle-dashboard">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" class="toggle-table">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">My Store</span>
            </a>
        </li>
        <li>
            <a href="#" class="toggle-order">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Orders</span>
            </a>
        </li>
        <li>
            <a href="#" class="toggle-message">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Message</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-group' ></i>
                <span class="text">Team</span>
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
                <label>Product Name</label>
                <input type="text" placeholder="Enter product name" name="product_name">
            </div>

            <div class="input-fields">
                <label>Category</label>
                <input type="text" placeholder="Category" name="category">
            </div>

            <div class="input-fields">
                <label>Product Description</label>
                <input type="text" placeholder="Description" name="description">
            </div>

            <div class="input-fields">
                <label>Price</label>
                <input type="text" placeholder="Price" name="price">
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

                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Pictuer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $pro)
                            <tr>
                                <td>{{$pro->pro_name}}</td>
                                <td>{{$pro->category}}</td>
                                <td>{{$pro->pro_des}}</td>
                                <td>${{$pro->price}}</td>
                                <td><img src="{{asset('storage/' .$pro->pro_pic)}}"></td>
                            </tr>
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
                        <h3>Products</h3>

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
                                <td>{{$oder->customer_name}}</td>
                                <td>{{$oder->location}}</td>
                                <td>{{$oder->product_id}}</td>
                                <input type="hidden" name="pro_id" value="{{$oder->product_id}}">
                                <td>{{$oder->products}}</td>
                                <td>{{$oder->Quantity}}</td>
                                <input type="hidden" name="quan" value="{{$oder->Quantity}}">
                                <td>{{$oder->Price}}</td>
                                <td>{{$oder->Date}}</td>
                                @if($oder->order_status==='Delivered')
                                    <td><span class="status completed">{{$oder->order_status}}</span></td>
                                @elseif($oder->order_status==='Shipping')
                                    <td><button type="submit" class="status pending">{{$oder->order_status}}</button></td>
                                    <input type="hidden" name="status" value="Delivered">
                                @else
                                    <td><span class="status process">{{$oder->order_status}}</span></td>
                                @endif
                                </form>
                            </tr>
                        @endforeach
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
</body>
</html>
