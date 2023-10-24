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
    <link rel="stylesheet" href="{{asset('css/style-prefix.css')}}">
    <style>
        /* Add custom CSS to center the footer and remove black background */
        footer {
            text-align: center; /* Center the content inside the footer */
            background: none; /* Remove background color */
            border-top: 1px solid #ccc; /* Add a border at the top */
            padding: 10px 0; /* Add padding to separate content from border */
        }

        .footer-content {
            display: inline-block; /* Center the content horizontally */
        }
    </style>
    <title>E-Commerce | Invoice</title>
</head>

<body>
<header>
    <div class="header-top">

        <div class="container">

            <ul class="header-social-container">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

            </ul>

            <div class="header-alert-news">
                <p>
                    <b>Free Shipping</b>
                    This Week Order Over - $55
                </p>
            </div>

            <div class="header-top-actions">

                <select name="currency" id="currency">

                    <option value="usd">USD &dollar;</option>
                    <option value="eur">EUR &euro;</option>
                    <option value="bdt">BDT &#2547;</option>

                </select>

                <select name="language">

                    <option value="en-US">English</option>
                    <option value="es-ES">Espa&ntilde;ol</option>
                    <option value="fr">Fran&ccedil;ais</option>

                </select>

            </div>

        </div>

    </div>
</header>
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
                        <div class="txn mt-2">TXN: {{ $user->Phone }}</div>
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
                                <td data-price-usd="{{ $cartItem->Price/ $cartItem->Quantity }}">{{ $cartItem->Price/ $cartItem->Quantity}}</td>
                                <td>{{ $cartItem->Quantity }}</td>
                                <td data-price-usd="{{ $cartItem->Price }}">{{ $cartItem->Price }}</td>
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
                            <td data-price-usd="{{ $total }}">{{$total}}</td>
                        </tr>
                        <tfoot>
                        <tr>
                            <td>Total:</td>
                            <td data-price-usd="{{ $total }}">{{$total}}</td>
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
            <div class="footer-content">
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
            </div>
        </footer>
    </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{asset('js/script.js')}}"></script>

<script>
    const exchangeRates = {
        usd: 1,    // 1 USD to USD (base currency)
        eur: 0.85, // Example: 1 USD to EUR is 0.85
        bdt: 110.32 // Example: 1 USD to BDT is 110.32
        // Add more currencies and exchange rates as needed
    };

    // Function to update the displayed price
    function updatePrice(currency) {
        const priceElements = document.querySelectorAll('[data-price-usd]');
        const selectedCurrency = document.getElementById('currency').value;
        const exchangeRate = exchangeRates[selectedCurrency];
        const currencySymbol = getCurrencySymbol(selectedCurrency);

        priceElements.forEach(priceElement => {
            const priceInUSD = parseFloat(priceElement.getAttribute('data-price-usd'));
            const convertedPrice = (priceInUSD * exchangeRate).toFixed(2);
            const formattedPrice = currency === 'usd' ? `$${priceInUSD}` : `${currencySymbol}${convertedPrice}`;
            priceElement.textContent = formattedPrice;
        });
    }

    // Function to get the currency symbol
    function getCurrencySymbol(currency) {
        switch (currency) {
            case 'usd':
                return '$';
            case 'eur':
                return '€'; // Euro symbol
            case 'bdt':
                return '৳'; // BDT symbol
            default:
                return currency;
        }
    }


    document.getElementById('currency').addEventListener('change', function() {
        const selectedCurrency = this.value;
        updatePrice(selectedCurrency);
    });

    updatePrice('usd');
</script>
</body>
</html>
