{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Admin Dashboard</title>--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
{{--    <style>--}}
{{--        .dashboard-card--}}
{{--        {--}}
{{--            padding: 20px;--}}
{{--            margin: 20px;--}}
{{--            border: 1px solid #ccc;--}}
{{--            border-radius: 5px;--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <h1 class="mt-4 mb-4">Admin Dashboard</h1>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-4">--}}
{{--            <div class="dashboard-card">--}}
{{--                <h2><a href="totalsells">Total Sales</a></h2>--}}
{{--                <h4><strong>Tk. {{$total}}</strong></h4>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-4">--}}
{{--            <div class="dashboard-card">--}}
{{--                <h2>Total Pending Orders</h2>--}}
{{--                <h4><strong>{{$pen}}</strong></h4>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-4">--}}
{{--            <div class="dashboard-card">--}}
{{--                <h2>Total Shipping Orders</h2>--}}
{{--                <h4><strong>{{$ship}}</strong></h4>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-md-4">--}}
{{--            <div class="dashboard-card">--}}
{{--                <h2>Total Deliver Orders</h2>--}}
{{--                <h4><strong>{{$total2}}</strong></h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}

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

    <title>AdminHub</title>
</head>



<body>


<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">SuperAdmin</span>
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
            <a href="#">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Analytics</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-message-dots' ></i>
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
{{--        <a href="#" class="notification">--}}
{{--            <i class='bx bxs-bell' ></i>--}}
{{--            <span class="num">8</span>--}}
{{--        </a>--}}
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

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check' ></i>
                <span class="text">
						<h3>{{$ship}}</h3>
						<p>Shipping Orders</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-group' ></i>
                <span class="text">
						<h3>{{$total2}}</h3>
						<p><a href="#" class="toggle-deliver"> Delivar Orders</a></p>
					</span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle' ></i>
                <span class="text">
						<h3>${{$total}}</h3>
						<p><a href="#" class="toggle-sells">Total Sales</a></p>
					</span>
            </li>
        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Orders</h3>
                    <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderinfo as $order)
                    <tr>
                        <td>
                            <p>{{$order->customer_name}}</p>
                        </td>
                        <td>{{$order->Date}}</td>
                        @if($order->order_status==='Delivered')
                        <td><span class="status completed">{{$order->order_status}}</span></td>
                        @elseif($order->order_status==='Shipping')
                            <td><span class="status pending">{{$order->order_status}}</span></td>
                        @else
                            <td><span class="status process">{{$order->order_status}}</span></td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Todos</h3>
                    <i class='bx bx-plus' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <ul class="todo-list">
                    <li class="completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="not-completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                    <li class="not-completed">
                        <p>Todo List</p>
                        <i class='bx bx-dots-vertical-rounded' ></i>
                    </li>
                </ul>
            </div>
        </div>
            </section>
        <section id="my-store" style="display: none;">
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
                @foreach($products as $prod)
                <tr>
                    <td>{{$prod->pro_name}}</td>
                    <td>{{$prod->category}}</td>
                    <td>{{$prod->pro_des}}</td>
                    <td>${{$prod->price}}</td>
                    <td><img src="{{asset('storage/' .$prod->pro_pic)}}"></td>
                </tr>
                @endforeach
                </tbody>
            </table>
                </div>
            </div>
        </section>

        <section id="delivar" style="display: none;">
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="inactive" href="#">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Deliver</a>
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
                    <a href="#" class="toggle-dashboard3"><i class="fa-solid fa-arrow-left"></i></a>
                    <h3>Recent Orders</h3>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderinfo2 as $order)
                        <tr>
                            <td>
                                <p>{{$order->customer_name}}</p>
                            </td>
                            <td>{{$order->Date}}</td>
                            @if($order->order_status==='Delivered')
                                <td><span class="status completed">{{$order->order_status}}</span></td>
                            @elseif($order->order_status==='Shipping')
                                <td><span class="status pending">{{$order->order_status}}</span></td>
                            @else
                                <td><span class="status process">{{$order->order_status}}</span></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </section>

        <section id="totalsells" style="display: none;">
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="inactive" href="#">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Total Sells</a>
                        </li>
                    </ul>
                </div>
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <a href="#" class="toggle-dashboard2"><i class="fa-solid fa-arrow-left"></i></a>
                        <h3>Total Sells</h3>
                    </div>
                    <table>
                        <thead>
                        <tr>
{{--                            <th>Serial</th>--}}
                            <th>Product</th>
                            <th>Quantity Sold</th>
                            <th>Unit Price</th>
{{--                            <th>Total Revenue</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sells as $sel)
                            <tr>
{{--                                <td>{{ $sel->pro_id }}</td>--}}
                                <input type="hidden" name="ids" value="{{ $sel->pro_id }}">
                                <td>{{ $sel->pro_name }}</td>

                                <td>{{ $sel->Quantity_Sold }}</td>

                                <td>${{ $sel->price }}</td>
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
<script src="{{asset('js/link.js')}}"></script>
</body>
</html>
