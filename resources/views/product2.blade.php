<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Add to Cart</title>
    <!-- MDB icon -->
    <link rel="icon" href="{{asset('logo/mdb-favicon.ico')}}" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-shopping-carts.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style-prefix.css')}}">
    <script src="https://kit.fontawesome.com/a87236255f.js" crossorigin="anonymous"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOsAVxBbbFUV0IVFifEZ1Kq97nPVevdXU&libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
<!-- Start your project here-->
<style>


    /* Style for the plus button */
    /*body {*/
    /*    font-family: 'Roboto', sans-serif;*/
    /*    background-color: #eee;*/
    /*    margin: 0;*/
    /*    padding: 0;*/
    /*}*/

    /*!* Header Styles *!*/
    /*.h-custom {*/
    /*    height: 100vh !important;*/
    /*}*/

    /*!* Product Card Styles *!*/
    /*.card.shopping-cart {*/
    /*    border-radius: 15px;*/
    /*}*/

    /*.card-body.text-black {*/
    /*    background-color: #fff;*/
    /*}*/

    /*!* Product Image Styles *!*/
    /*.card-body .flex-shrink-0 img {*/
    /*    width: 150px;*/
    /*}*/

    /*!* Product Details Styles *!*/
    /*.card-body .flex-grow-1 {*/
    /*    margin-left: 20px;*/
    /*}*/

    /*.card-body .text-primary {*/
    /*    font-size: 24px;*/
    /*}*/

    /*!* Quantity Input Styles *!*/
    /*.number-input input[type="number"] {*/
    /*    -webkit-appearance: textfield;*/
    /*    -moz-appearance: textfield;*/
    /*    appearance: textfield;*/
    /*}*/

    /*.number-input input[type=number]::-webkit-inner-spin-button,*/
    /*.number-input input[type=number]::-webkit-outer-spin-button {*/
    /*    -webkit-appearance: none;*/
    /*}*/

    /*.number-input button {*/
    /*    -webkit-appearance: none;*/
    /*    background-color: transparent;*/
    /*    border: none;*/
    /*    align-items: center;*/
    /*    justify-content: center;*/
    /*    cursor: pointer;*/
    /*    margin: 0;*/
    /*    position: relative;*/
    /*}*/

    /*.number-input button:before,*/
    /*.number-input button:after {*/
    /*    display: inline-block;*/
    /*    position: absolute;*/
    /*    content: '';*/
    /*    height: 2px;*/
    /*    transform: translate(-50%, -50%);*/
    /*}*/

    /*.number-input button.plus:after {*/
    /*    transform: translate(-50%, -50%) rotate(90deg);*/
    /*}*/

    /*.number-input input[type=number] {*/
    /*    text-align: center;*/
    /*}*/

    /*.number-input.number-input {*/
    /*    border: 1px solid #ced4da;*/
    /*    width: 10rem;*/
    /*    border-radius: .25rem;*/
    /*}*/

    /*.number-input.number-input button {*/
    /*    width: 2.6rem;*/
    /*    height: .7rem;*/
    /*}*/

    /*.number-input.number-input button.minus {*/
    /*    padding-left: 10px;*/
    /*}*/

    /*.number-input.number-input button:before,*/
    /*.number-input.number-input button:after {*/
    /*    width: .7rem;*/
    /*    background-color: #495057;*/
    /*}*/

    /*.number-input.number-input input[type=number] {*/
    /*    max-width: 4rem;*/
    /*    padding: .5rem;*/
    /*    border: 1px solid #ced4da;*/
    /*    border-width: 0 1px;*/
    /*    font-size: 1rem;*/
    /*    height: 2rem;*/
    /*    color: #495057;*/
    /*}*/

    /*@media not all and (min-resolution:.001dpcm) {*/
    /*    @supports (-webkit-appearance: none) and (stroke-color:transparent) {*/
    /*        .number-input.def-number-input.safari_only button:before,*/
    /*        .number-input.def-number-input.safari_only button:after {*/
    /*            margin-top: -.3rem;*/
    /*        }*/
    /*    }*/
    /*}*/

    /*!* Total Price Styles *!*/
    /*.d-flex.justify-content-between.p-2.mb-2 {*/
    /*    background-color: #e1f5fe;*/
    /*}*/

    /*.fw-bold {*/
    /*    font-weight: bold;*/
    /*}*/

    /*!* Your Info Styles *!*/
    /*.form-outline {*/
    /*    margin-bottom: 1.5rem;*/
    /*}*/

    /*.btn.btn-primary.btn-block.btn-lg {*/
    /*    background-color: #1266f1;*/
    /*    color: #fff;*/
    /*    border: none;*/
    /*}*/

    /*.btn.btn-primary.btn-block.btn-lg:hover {*/
    /*    background-color: #0e5aa8;*/
    /*}*/

    /* Update the background color of the section */
    .h-custom {
        background-color: #f4f4f4;
    }

    /* Style the container */
    .container {
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    /* Style the card body */
    .card-body {
        color: #333;
    }

    /* Style the product image */
    .card-body img {
        max-width: 100%;
        border: 1px solid #ccc;
        border-radius: 10px;
    }

    /* Update the style of the 'Your products' title */
    h3.text-uppercase {
        font-size: 24px;
        color: #1266f1;
    }

    /* Style the product name */
    h5.text-primary {
        color: #1266f1;
    }

    .additional-comment {
        display: none;
    }


    /* Style the product description */
    h6 {
        color: #9e9e9e;
    }

    /* Style the quantity input and size select */
    .def-number-input input, .def-number-input select {
        border: 1px solid #333;
        padding: 5px;
    }

    /* Style the 'Total' section */
    .p-2 {
        background-color: #e1f5fe;
        border-radius: 10px;
    }

    /* Style the 'Add to cart' button */
    .btn-primary {
        background-color: #1266f1;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
    }

    /* Update the design of the form inputs */
    .form-control {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
    }

    /* Style the form labels */
    .form-label {
        color: #1266f1;
        font-weight: bold;
    }

    /* Add styles to the form buttons */
    button.btn-primary {
        background-color: #1266f1;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
    }

    /* Add some margin to the bottom of the 'Lorem ipsum' paragraph */
    p.mb-5 {
        margin-bottom: 20px;
    }

    /* Update the card and form container spacing */
    .col {
        margin: 10px;
    }

    /* Style the quantity input arrows */
    .fa-arrow-up, .fa-arrow-down {
        cursor: pointer;
        color: #1266f1;
        font-size: 18px;
    }

    /* Style the 'Close' icon */
    a.float-end {
        color: #1266f1;
    }

    /* Style the borders of the input elements */
    input[type="text"],
    input[type="password"],
    input[type="number"],
    select {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px;
    }

</style>
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

<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card shopping-cart" style="border-radius: 15px;">
                    <div class="card-body text-black">

                        <div class="row">
                            <div class="col-lg-6 px-5 py-4">

                                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your products</h3>

                                <div class="d-flex align-items-center mb-5">
                                    <div class="flex-shrink-0">
                                        <img src="{{asset('storage/' .$show->img1)}}"
                                             class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                                    </div>

                                    <div class="flex-grow-1 ms-3">
                                        <form action="{{ route('insertorder2',['id' => $show->userid]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$show->userid}}">
                                            <input type="hidden" name="name" value="{{$user->name}}">
                                            <input type="hidden" name="ids3" value="{{$user->id}}">
                                            <input type="hidden" name="ids" value="{{$show->id}}">
                                            <input type="hidden" name="category" value="{{$show->category}}">

                                            <input type="hidden" name="status" value="Pending">
                                            <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                                            <h5 class="text-primary">{{$show->name}}</h5>
                                            <input type="hidden" name="pro_name" value="{{$show->name}}">
                                            {{--                                        <h6 style="color: #9e9e9e;">{{$show->pro_des}}</h6>--}}
                                            <div class="d-flex align-items-center">
                                                <p class="fw-bold mb-0 me-5 pe-3" data-price-usd="{{ $show->price }}">${{$show->price}}</p>
                                                <input type="hidden" name="total_price" value="{{ $show->price }}">

                                            </div>

                                    </div>

                                </div>


                                <h6 style="color: black;">{{$show->description}}</h6>


                                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                                    <h5 class="fw-bold mb-0">Total:</h5>
                                    <h5 class="fw-bold mb-0" id="totalPriceLabel" name="total_price" data-total-price-usd="0">$0</h5>
                                    <input type="hidden" id="totalPriceInput" name="total_price" value="{{ $show->price }}">
                                </div>


                            </div>
                            <div class="col-lg-6 px-5 py-4">

                                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your Info</h3>



                                <div class="form-outline mb-5">
                                    <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                           value="{{$user->name}}" minlength="19" maxlength="19" readonly/>
                                    <label class="form-label" for="typeText">Name</label>
                                </div>

                                <div class="form-outline mb-5">
                                    <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                           value="" name="loc" required/>
                                    <label class="form-label" for="typeName">Location</label>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <div class="form-outline">
                                            <input type="text" id="typeExp" class="form-control form-control-lg" value="{{$user->phone}}"
                                                   size="7" id="exp" minlength="7" maxlength="7" readonly />
                                            <label class="form-label" for="typeExp">Mobile Number</label>
                                        </div>
                                    </div>

                                </div>

                                {{--                                    <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit <a--}}
                                {{--                                            href="#!">obcaecati sapiente</a>.</p>--}}

                                <button type="submit" name="action" value="add_to_cart" class="btn btn-primary btn-block btn-lg">Add to cart</button>
                                <button type="submit" name="action" value="buy_now" class="btn btn-primary btn-primary2 btn-block btn-lg" style="background-color: #FE9601 ">Buy Now</button>
                                </form>




                            </div>
                        </div>
                        <div class="container mt-5">
                            <h3 class="mb-4">Comments</h3>

                            <!-- Comment Form -->
                            <div class="comment-form">
                                <form action="{{ route('comment', ['id' => $user->id]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="ids" value="{{$show->id}}">
                                    <label for="rating">Rating:</label>
                                    <div class="star-rating" id="rating">
                                        <input type="hidden" name="rating" id="rating-input" value="">
                                        <i class="far fa-star" data-star="1"></i>
                                        <i class="far fa-star" data-star="2"></i>
                                        <i class="far fa-star" data-star="3"></i>
                                        <i class="far fa-star" data-star="4"></i>
                                        <i class="far fa-star" data-star="5"></i>
                                        <!-- Add more stars here -->
                                    </div>
                                    <textarea id="commentText" name="comment" style="height: 50px; width: 50%"></textarea>
                                    <button type="submit" name="action" value="comment" class="btn btn-primary" id="postComment">Comment</button>
                                </form>
                            </div>

                            <!-- Comment Display -->
                            <div class="comments-list mt-4">
                                @foreach($comment as $key => $rat)
                                    <div class="comment{{ $key >= 2 ? ' additional-comment' : '' }}">
                                        <div class="comment-header">
                                            <span class="comment-author"><h6>{{ $rat->name }}</h6></span><br>
                                            <div class="comment-text">
                                                <h5>{{ $rat->commenttxt }}</h5>
                                            </div>
                                            <span class="comment-date">{{ $rat->time }}</span>
                                        </div>
                                    </div>
                                @endforeach

                                @if (count($comment) > 2)
                                    <div class="view-more-comments">
                                        <a href="#" id="view-more-link">View more (+{{ count($comment) - 2 }}) comments</a>
                                    </div>
                                @endif
                            </div>

                        </div>

                        <!-- End of Example Comment -->

                        <!-- You can dynamically add more comments here using JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<section class="products-you-may-like">
    <div class="container">
        <h3 class="mb-4">Products You May Like</h3>

        <!-- Add your product cards or items here -->
        <!-- You can create a loop to display multiple products, or add them manually as per your requirements -->

        <div class="row">
            @foreach($show2 as $sho)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('storage/' .$sho->pro_pic)}}" style="height: 150px; width: 150px;" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{$sho->pro_name}}</h5>
                            <p class="card-text">{{$sho->pro_des}}.</p>
                            <a href="{{ route('product', ['id' => $sho->pro_id,'ids'=>$user->id,'category'=>$sho->category]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- End your project here-->

<!-- MDB -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{asset('js/script.js')}}"></script>


<!-- Custom scripts -->
<script type="text/javascript"></script>
<script>

    $(document).ready(function () {

        var input = document.getElementById('typeName');


        var autocomplete = new google.maps.places.Autocomplete(input);


        autocomplete.setTypes(['geocode']);


        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if (place.geometry) {
                console.log(place);
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const price = {{$show->price}};
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('totalPriceInput');
        const totalPriceLabel = document.getElementById('totalPriceLabel');

        quantityInput.addEventListener('input', updateTotalPrice);

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value);
            const totalPrice = price * quantity;
            totalPriceInput.value = totalPrice;

            const selectedCurrency = document.getElementById('currency').value;
            const exchangeRate = exchangeRates[selectedCurrency];
            const currencySymbol = getCurrencySymbol(selectedCurrency);

            const totalPriceInUSD = totalPrice / exchangeRate;
            const formattedTotalPrice = selectedCurrency === 'usd' ? `$${totalPriceInUSD.toFixed(2)}` : `${currencySymbol}${totalPrice.toFixed(2)}`;
            totalPriceLabel.textContent = formattedTotalPrice;
        }
    });

    // Rest of your code (exchange rates and currency conversion functions)
    const exchangeRates = {
        usd: 1,    // 1 USD to USD (base currency)
        eur: 0.85, // Example: 1 USD to EUR is 0.85
        bdt: 110.32 // Example: 1 USD to BDT is 110.32
        // Add more currencies and exchange rates as needed
    };

    // Function to update the displayed price
    function updatePrice(currency) {
        const priceElements = document.querySelectorAll('[data-price-usd]');
        const totalElement = document.getElementById('totalPriceLabel');
        const selectedCurrency = document.getElementById('currency').value;
        const exchangeRate = exchangeRates[selectedCurrency];
        const currencySymbol = getCurrencySymbol(selectedCurrency);

        priceElements.forEach(priceElement => {
            const priceInUSD = parseFloat(priceElement.getAttribute('data-price-usd'));
            const convertedPrice = (priceInUSD * exchangeRate).toFixed(2);
            const formattedPrice = currency === 'usd' ? `$${priceInUSD}` : `${currencySymbol}${convertedPrice}`;
            priceElement.textContent = formattedPrice;
        });

        const totalInUSD = parseFloat(totalElement.getAttribute('data-total-price-usd'));
        const convertedTotalPrice = (totalInUSD * exchangeRate).toFixed(2);
        const formattedTotalPrice = currency === 'usd' ? `$${totalInUSD}` : `${currencySymbol}${convertedTotalPrice}`;
        totalElement.textContent = formattedTotalPrice;
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

    var quantityInput = document.getElementById('quantity');
    var stockText = document.getElementById('stock');
    var stockStatus = document.getElementById('stockStatus');
    var addToCartButton = document.querySelector('.btn-primary');
    var addToCartButton2 = document.querySelector('.btn-primary2');
    var initialStock = parseInt(stockText.value) || 1;
    var initialStatus = stockStatus.value;
    var stockStatusMessage = document.getElementById('stockStatusMessage');

    stockText.addEventListener('input', function() {
        initialStock = parseInt(stockText.value) || 0;
    });

    stockStatus.addEventListener('input', function() {
        initialStatus = stockStatus.value;
    });

    quantityInput.addEventListener('input', function() {
        var quantity = parseInt(quantityInput.value) || 0;
        var remainingStock = initialStock - quantity;

        if (remainingStock < 0) {
            remainingStock = 0;
        }

        // Update the input fields with the calculated values
        stockText.value = remainingStock;
        stockStatus.value = remainingStock === 0 ? "Out of Stock" : initialStatus;

        if (remainingStock === 0) {
            addToCartButton.style.display = "none";
            addToCartButton2.style.display = "none";
            stockStatusMessage.style.display = "block";
        } else {
            addToCartButton.style.display = "block";
            addToCartButton2.style.display = "block";
            stockStatusMessage.style.display = "none";
        }
    });

    $(document).ready(function () {
        // Initial star ratings setup
        $(".star-rating i").on("click", function () {
            var rating = $(this).data("star");
            resetStars(); // Reset all stars
            fillStars(rating); // Fill stars up to the selected rating
            $("#rating-input").val(rating); // Set the rating value in a hidden input field
        });

        // Function to reset all stars
        function resetStars() {
            $(".star-rating i").removeClass("fas").addClass("far");
        }

        // Function to fill stars up to the selected rating
        function fillStars(rating) {
            for (var i = 1; i <= rating; i++) {
                $(".star-rating i[data-star='" + i + "']").removeClass("far").addClass("fas");
            }
        }
    });

    $(document).ready(function() {
        $('#view-more-link').click(function(e) {
            e.preventDefault();
            $('.additional-comment').toggle();
            $('#view-more-link').text(function(i, text) {
                return text === "View more (+{{ count($comment) - 2 }}) comments" ? "Hide comments" : "View more (+{{ count($comment) - 2 }}) comments";
            });
        });
    });


</script>


</body>

</html>
