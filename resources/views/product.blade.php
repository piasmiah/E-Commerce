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
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-shopping-carts.min.css')}}" />
</head>

<body>
<!-- Start your project here-->
<style>


    /* Style for the plus button */
    .quantity-up {
        background-color: #4285f4;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        font-size: 18px;
        cursor: pointer;
    }

    /* Style for the minus button */
    .quantity-down {
        background-color: #9e9e9e;
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        font-size: 18px;
        cursor: pointer;
    }

    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    .number-input input[type="number"] {
        -webkit-appearance: textfield;
        -moz-appearance: textfield;
        appearance: textfield;
    }

    .number-input input[type=number]::-webkit-inner-spin-button,
    .number-input input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    .number-input button {
        -webkit-appearance: none;
        background-color: transparent;
        border: none;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin: 0;
        position: relative;
    }

    .number-input button:before,
    .number-input button:after {
        display: inline-block;
        position: absolute;
        content: '';
        height: 2px;
        transform: translate(-50%, -50%);
    }

    .number-input button.plus:after {
        transform: translate(-50%, -50%) rotate(90deg);
    }

    .number-input input[type=number] {
        text-align: center;
    }

    .number-input.number-input {
        border: 1px solid #ced4da;
        width: 10rem;
        border-radius: .25rem;
    }

    .number-input.number-input button {
        width: 2.6rem;
        height: .7rem;
    }

    .number-input.number-input button.minus {
        padding-left: 10px;
    }

    .number-input.number-input button:before,
    .number-input.number-input button:after {
        width: .7rem;
        background-color: #495057;
    }

    .number-input.number-input input[type=number] {
        max-width: 4rem;
        padding: .5rem;
        border: 1px solid #ced4da;
        border-width: 0 1px;
        font-size: 1rem;
        height: 2rem;
        color: #495057;
    }

    @media not all and (min-resolution:.001dpcm) {
        @supports (-webkit-appearance: none) and (stroke-color:transparent) {

            .number-input.def-number-input.safari_only button:before,
            .number-input.def-number-input.safari_only button:after {
                margin-top: -.3rem;
            }
        }
    }

    .shopping-cart .def-number-input.number-input {
        border: none;
    }

    .shopping-cart .def-number-input.number-input input[type=number] {
        max-width: 2rem;
        border: none;
    }

    .shopping-cart .def-number-input.number-input input[type=number].black-text,
    .shopping-cart .def-number-input.number-input input.btn.btn-link[type=number],
    .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:hover,
    .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:focus {
        color: #212529 !important;
    }

    .shopping-cart .def-number-input.number-input button {
        width: 1rem;
    }

    .shopping-cart .def-number-input.number-input button:before,
    .shopping-cart .def-number-input.number-input button:after {
        width: .5rem;
    }

    .shopping-cart .def-number-input.number-input button.minus:before,
    .shopping-cart .def-number-input.number-input button.minus:after {
        background-color: #9e9e9e;
    }

    .shopping-cart .def-number-input.number-input button.plus:before,
    .shopping-cart .def-number-input.number-input button.plus:after {
        background-color: #4285f4;
    }
</style>

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
                                        <img src="{{asset('storage/' .$show->pro_pic)}}"
                                             class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <form action="{{ route('insertorder',['id' => $user->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <input type="hidden" name="name" value="{{$user->name}}">
                                            <input type="hidden" name="ids" value="{{$show->pro_id}}">
                                            <input type="hidden" name="status" value="Pending">
                                        <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                                        <h5 class="text-primary">{{$show->pro_name}}</h5>
                                            <input type="hidden" name="pro_name" value="{{$show->pro_name}}">
                                        <h6 style="color: #9e9e9e;">{{$show->pro_des}}</h6>
                                        <div class="d-flex align-items-center">
                                            <p class="fw-bold mb-0 me-5 pe-3">{{$show->price}}$</p>

                                            <div class="def-number-input number-input safari_only">
                                                <label>Quantity</label>
                                                <div class="input-group">


                                                        <input class="quantity fw-bold text-black" id="quantity" min="0" name="quantity" value="1" type="number">

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>





                                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                                    <h5 class="fw-bold mb-0">Total:</h5>
                                    <h5 class="fw-bold mb-0" id="totalPriceLabel" name="total_price">$0</h5>
                                    <input type="hidden" id="totalPriceInput" name="total_price" value="0">
                                </div>


                            </div>
                            <div class="col-lg-6 px-5 py-4">

                                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your Info</h3>



                                    <div class="form-outline mb-5">
                                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                               value="{{$user->name}}" minlength="19" maxlength="19" />
                                        <label class="form-label" for="typeText">Name</label>
                                    </div>

                                    <div class="form-outline mb-5">
                                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                               value="" name="loc" />
                                        <label class="form-label" for="typeName">Location</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <div class="form-outline">
                                                <input type="text" id="typeExp" class="form-control form-control-lg" value="01/22"
                                                       size="7" id="exp" minlength="7" maxlength="7" />
                                                <label class="form-label" for="typeExp">Expiration</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <div class="form-outline">
                                                <input type="password" id="typeText" class="form-control form-control-lg"
                                                       value="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                                <label class="form-label" for="typeText">Cvv</label>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit <a
                                            href="#!">obcaecati sapiente</a>.</p>

                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Add to cart</button>
                                </form>




                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End your project here-->

<!-- MDB -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const price = {{$show->price}};
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('totalPriceInput');
        const totalPriceLabel = document.getElementById('totalPriceLabel');

        quantityInput.addEventListener('input', updateTotalPrice);

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value);
            const totalPrice = price * quantity;
            totalPriceInput.value = totalPrice ;
            totalPriceLabel.textContent = totalPrice;
        }
    });
</script>

</body>

</html>
