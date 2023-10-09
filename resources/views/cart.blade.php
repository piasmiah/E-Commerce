<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{asset('css/invoice.css')}}">

    <title>E-Commerce | Invoice</title>
</head>

<body>
<div class="my-5 page" size="A4">
    <div class="p-5">
        <section class="top-content bb d-flex justify-content-between">
            <div class="logo">
                <img src="{{asset('logo/373424354_271132175678032_7983821530389921624_n.png')}}" alt="" class="img-fluid">
            </div>
            <div class="top-left">
                <div class="graphic-path">
                    <p>Invoice</p>
                </div>
                <div class="position-relative">
                    <p>Invoice No. <span>XXXX</span></p>
                </div>
            </div>
        </section>

        <section class="store-user mt-5">
            <div class="col-10">
                <div class="row bb pb-3">
                    <div class="col-7">
                        <p>Supplier,</p>
                        <h2>E Commerce</h2>
                        <p class="address"> 777 Brockton Avenue, <br> Abington MA 2351, <br>Vestavia Hills AL </p>
                        <div class="txn mt-2">TXN: XXXXXXX</div>
                    </div>
                    <div class="col-5">
                        <p>Client,</p>
                        <h2>{{ $user->name }}</h2>
                        <h3>{{ $user->id }}</h3>
                        <p class="address"> {{$loc->location}} </p>
                        <div class="txn mt-2">TXN: XXXXXXX</div>
                    </div>
                </div>
                <div class="row extra-info pt-3">
                    <div class="col-5">
                        <p>Deliver Date: <span>10-04.2021</span></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-area mt-4">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>Item Description</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
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
                    <td>
                        <div class="media">
                            <input type="hidden" name="orid" value="{{$cartItem->order_id}}">
                            <div class="media-body">
                                <p class="mt-0 title">Product Id: {{ $cartItem->product_id }}</p>
                                {{ $cartItem->products }}
                            </div>
                        </div>
                    </td>
                    <td>{{ $cartItem->Price/ $cartItem->Quantity}}</td>
                    <td>{{ $cartItem->Quantity }}</td>
                    <td>{{ $cartItem->Price }}</td>
                </tr>
                    @php      $total +=   $cartItem->Price;        @endphp
                        @endforeach
                </tbody>
            </table>
        </section>

        <section class="balance-info">
            <div class="row">
                <div class="col-8">
                    <p class="m-0 font-weight-bold"> Note: </p>
                    <p>It is very important for the customer to pay attention to the adipiscing process. To be chosen is to be gained by the suffering of those who are present.</p>
                </div>
                <div class="col-4">
                    <table class="table border-0 table-hover">
                        <tr>
                            <td>Sub Total:</td>
                            <td>{{$total}}</td>
                        </tr>
                        <tfoot>
                        <tr>
                            <td>Total:</td>
                            <td>{{$total}}</td>
                        </tr>
                        </tfoot>
                    </table>

                    <!-- Signature -->
                    <div class="col-12">
                        <img src="{{asset('logo/signature.png')}}" class="img-fluid" alt="">
                        <p class="text-center m-0"> Director Signature </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cart BG -->
        <img src="cart.jpg" class="img-fluid cart-bg" alt="">

        <footer>
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
            <hr>

            @if ($paymentCompleted)

{{--                <button class="btn btn-secondary" onclick="printInvoice()">Print Invoice</button>--}}

            <p class="m-0 text-center">
                Paid- <a href="#!"> invoice/saburbd.com/#868 </a>
            </p>
            @else
                <a href="{{ route('payment',['id'=>$user->id]) }}" class="pay-now-link">Pay now</a>
            @endif

            <div class="social pt-3">
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        <span>0123456789</span>
                    </span>
                <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>me@saburali.com</span>
                    </span>
                <span class="pr-2">
                        <i class="fab fa-facebook-f"></i>
                        <span>/sabur.7264</span>
                    </span>
                <span class="pr-2">
                        <i class="fab fa-youtube"></i>
                        <span>/abdussabur</span>
                    </span>
                <span class="pr-2">
                        <i class="fab fa-github"></i>
                        <span>/example</span>
                    </span>
            </div>
        </footer>
    </div>
</div>


</body>
</html>
