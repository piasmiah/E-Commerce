<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce | Delivery Boy</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/a87236255f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/flag-icon-css/css/flag-icon.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>

    body {
        background: #f5f5f5;
        margin-top: 20px;
    }

    .ui-w-80 {
        width : 80px !important;
        height: auto;
    }

    .btn-default {
        border-color: rgba(24, 28, 33, 0.1);
        background  : rgba(0, 0, 0, 0);
        color       : #4E5155;
    }

    label.btn {
        margin-bottom: 0;
    }

    .btn-outline-primary {
        border-color: #26B4FF;
        background  : transparent;
        color       : #26B4FF;
    }

    .btn {
        cursor: pointer;
    }

    .text-light {
        color: #babbbc !important;
    }

    .btn-facebook {
        border-color: rgba(0, 0, 0, 0);
        background  : #3B5998;
        color       : #fff;
    }

    .btn-instagram {
        border-color: rgba(0, 0, 0, 0);
        background  : #000;
        color       : #fff;
    }

    .card {
        background-clip: padding-box;
        box-shadow     : 0 1px 4px rgba(24, 28, 33, 0.012);
    }

    .row-bordered {
        overflow: hidden;
    }

    .account-settings-fileinput {
        position  : absolute;
        visibility: hidden;
        width     : 1px;
        height    : 1px;
        opacity   : 0;
    }

    .account-settings-links .list-group-item.active {
        font-weight: bold !important;
    }

    html:not(.dark-style) .account-settings-links .list-group-item.active {
        background: transparent !important;
    }

    .account-settings-multiselect~.select2-container {
        width: 100% !important;
    }

    .light-style .account-settings-links .list-group-item {
        padding     : 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    .light-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }

    .material-style .account-settings-links .list-group-item {
        padding     : 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    .material-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }

    .dark-style .account-settings-links .list-group-item {
        padding     : 0.85rem 1.5rem;
        border-color: rgba(255, 255, 255, 0.03) !important;
    }

    .dark-style .account-settings-links .list-group-item.active {
        color: #fff !important;
    }

    .light-style .account-settings-links .list-group-item.active {
        color: #4E5155 !important;
    }

    .light-style .account-settings-links .list-group-item {
        padding     : 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    /* Hide all sections by default */
    #my-store, #delivar {
        display: none;
    }

    /* Show the active section */
    #dashboard.active-section {
        display: block;
    }
    #my-store.active-section {
        display: block;
    }
    #delivar.active-section {
        display: block;
    }

    .delivered-status {
        color: green;
        font-weight: bold;

    }
    .delivered-status::before {
        content: "✓";
        margin-right: 5px;

    }
    .delivered-status {
        color: green;
        font-weight: bold;
    }

    .delivered-status::tooltip {
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 5px;
        font-size: 12px;
        position: absolute;
        z-index: 10;
    }

    .delivered-status::tooltip:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -5px;
        margin-top: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent transparent #ccc;
    }



</style>
</head>
<body>

<ul class="nav nav-tabs justify-content-center " data-bs-theme="dark">

    <li class="nav-item">
        <a class="nav-link active toggle-dashboard" style="font-weight: bold;" aria-current="page" href="#home">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link toggle-table" style="font-weight: bold;" href="#MyDelivaries">My Delivaries</a>
    </li>
    <li class="nav-item">
        <a class="nav-link toggle-deliver" style="font-weight: bold;" href="#MyProfile">My Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true" style="color: black; font-weight: bold">{{$id->name}}</a>
    </li>



</ul>

<main>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<section id="dashboard">
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <table class="table text-center caption-top">
            <caption>HI</caption>
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Location</th>
                <th scope="col">Product Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Delivary Date</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($order2 as $orders)
                <form action="{{route('updatedelivar',['id'=>$id->id])}}" method="post">
                    @csrf
                <tr>
                    <th scope="row">{{$orders->order_id}}</th>
                    <input type="hidden" name="id" value="{{$orders->order_id}}"/>
                    <td>{{$orders->customer_name}}</td>
                    <td>{{$orders->location}}</td>
                    <td>{{$orders->product_id}}</td>
                    <td>{{$orders->products}}</td>
                    <td>{{$orders->Quantity}}</td>
                    <td>{{$orders->Price}}</td>
                    <td>{{$orders->Date}}</td>
                    <td><button type="submit" name="status" class="btn btn-primary" value="Delivered">{{$orders->order_status}}</button></td>
                </tr>
                </form>
            @endforeach
            <tr>
                <td colspan="10"><hr></td>
            </tr>
            @foreach($order as $orders)
                <form action="{{route('updatedelivar',['id'=>$id->id])}}" method="post">
                    @csrf
            <tr>
                <th scope="row">{{$orders->order_id}}</th>
                <input type="hidden" name="id" value="{{$orders->order_id}}"/>
                <td>{{$orders->customer_name}}</td>
                <td>{{$orders->location}}</td>
                <td>{{$orders->product_id}}</td>
                <td>{{$orders->products}}</td>
                <td>{{$orders->Quantity}}</td>
                <td>{{$orders->Price}}</td>
                <td>{{$orders->Date}}</td>
                <td><button type="submit" name="status" class="btn btn-primary" value="On the Way">{{$orders->order_status}}</button></td>
            </tr>
                </form>
            @endforeach

            </tbody>

        </table>
        {{$order->links()}}
    </div>
</div>
</section>
    <section id="my-store" style="display: none">
        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">
                <table class="table text-center caption-top">
                    <caption>{{$id->name}}, you delivered {{$mydeliveries2}} product/products in {{$currentMonths}} month.</caption>
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delivary Date</th>
                        <th scope="col">Place Date</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mydeliveries as $orders)
                            <tr>
                                <th scope="row">{{$orders->order_id}}</th>
                                <input type="hidden" name="id" value="{{$orders->order_id}}"/>
                                <td>{{$orders->customer_name}}</td>
                                <td>{{$orders->location}}</td>
                                <td>{{$orders->product_id}}</td>
                                <td>{{$orders->products}}</td>
                                <td>{{$orders->Quantity}}</td>
                                <td>{{$orders->Price}}</td>
                                <td>{{$orders->Date}}</td>
                                <td>{{$orders->created_at}}</td>
                                <td><span class="delivered-status">{{$orders->order_status}}</span></td>
                            </tr>
                    @endforeach
                    </tbody>

                </table>
                {{$order->links()}}
            </div>
        </div>
    </section>
    <section id="delivar" style="display: none">
        <div class="container light-style flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-4">
                Account settings
            </h4>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list"
                               href="#account-general">General</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                               href="#account-change-password">Change password</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                               href="#account-info">Info</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                               href="#account-social-links">Social links</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">
                                <form action="{{route('infoupdate',['id'=>$id->id])}}" method="post">
                                    @csrf
                                <div class="card-body media align-items-center">
                                    <img src="{{asset('storage/' .$id->photo)}}" alt
                                         class="d-block ui-w-80">

                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary">
                                            Upload new photo
                                            <input type="file" name="pic" class="account-settings-fileinput">
                                        </label> &nbsp;
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Serial No: {{$id->id}}</label>
                                        <input type="hidden" name="id" class="form-control" value="{{$id->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$id->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">E-mail</label>
                                        <input type="text" name="email" class="form-control mb-1" value="{{$id->email}}">

                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{$id->address}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">NID</label>
                                        <input type="text" name="nid" class="form-control" value="{{$id->nid}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Delivered</label>
                                        <input type="text" class="form-control" value="{{$mydeliveries2}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-change-password">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Current password</label>
                                        <input type="password" name="current" class="form-control" value="{{$id->password}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">New password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Confirm password</label>
                                        <input type="password" name="confirm-password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-info">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Birthday</label>
                                        <input type="date" name="dob" class="form-control" value="{{$existuser->DOB}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Country</label>
                                        <select class="form-control" name="country">
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Canada">Canada</option>
                                            <option value="UK">UK</option>
                                            <option value="USA">USA</option>
                                            <option value="Germany">Germany</option>
                                            <option value="France">France</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4" style="font-weight: bold">Contacts</h6>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$id->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold; flex: 1;">Phone Code</label>
                                    </div>
                                    <div class="form-group" style="display: flex; align-items: center;">
                                        <select class="form-control" name="code" style="width: 50px; flex: 3;">
                                            <option value="+880">BD: +880</option>
                                            <option value="+1">Can: +1</option>
                                            <option value="+44">UK: +44</option>
                                            <option value="+1">USA: +1</option>
                                            <option value="+49">Ger: +49</option>
                                            <option value="+33">Fra: +33</option>
                                        </select>
                                        <input type="text" class="form-control" name="secphone" value="{{$existuser->second_phone}}" style="flex: 3;">
                                    </div>

                                    {{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label" style="font-weight: bold">Secondary Phone</label>--}}
{{--                                        <input type="text" class="form-control" name="secphone" value="{{$existuser->second_phone}}">--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-social-links">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Twitter</label>
                                        <input type="text" name="twitter" class="form-control" value="{{$existuser->twitter}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Facebook</label>
                                        <input type="text" name="facebook" class="form-control" value="{{$existuser->facebook}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">LinkedIn</label>
                                        <input type="text" name="linkedin" class="form-control" value="{{$existuser->linkedIn}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="font-weight: bold">Instagram</label>
                                        <input type="text" name="instagram" class="form-control" value="{{$existuser->instagram}}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="{{asset('js/delivary.js')}}"></script>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
