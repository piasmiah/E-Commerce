<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Order</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #333;
        }

        .navbar-nav .nav-link {
            color: white;
        }

        /* Slideshow Styles */
        .slideshow {
            width: 100%; /* Adjust width as needed */
            margin: 30px auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .slide-container {
            width: 300%; /* Three slides */
            height: 200%;
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            flex: 0 0 33.33%; /* Equal width for each slide */
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        /* Styling for Order Details */
        .slide h2 {
            margin-bottom: 10px;
        }

        .slide p {
            margin: 5px 0;
        }

        /* Button Styles */
        button {
            display: block;
            margin: 0 auto;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        .slide {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px;
            background-color: #f9f9f9;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #666;
            margin: 10px 0;
        }

        .customer-info {
            font-weight: bold;
        }

        .product-info {
            font-style: italic;
        }

        .price {
            color: #e57373;
        }

        .payment {
            color: #64b5f6;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="container">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">
    <h1 class="text-center">Pending Orders</h1>
    <div class="slideshow">
        <div class="slide-container">
            @foreach($order as $oder)
            <div class="slide">
                <h2>Order {{$oder->order_id}}</h2>
                <p class="customer-info">Customer SL No. {{$oder->customer_id}}</p>
                <p class="customer-info">Customer Name: {{$oder->customer_name}}</p>
                <p class="customer-info">Location: {{$oder->location}}</p>
                <p class="product-info">Product: {{$oder->product_id}} {{$oder->products}}</p>
                <p class="product-info">Quantity: {{$oder->Quantity}}</p>
                <p class="price">Price: {{$oder->Price}}</p>
                <p class="payment">Payment: {{$oder->Payment}}</p>
                <button class="print-slide-btn">Print</button>
            </div>
            @endforeach
        </div>
    </div>
    <button id="nextButton">Next</button>

    <script>
        const slideContainer = document.querySelector('.slide-container');
        const slides = document.querySelectorAll('.slide');
        const nextButton = document.getElementById('nextButton');
        let currentSlide = 0;

        function showSlide(index) {
            slideContainer.style.transform = `translateX(-${index * 33.33}%)`;
            slides.forEach(slide => slide.classList.remove('active'));
            slides[index].classList.add('active');
        }

        nextButton.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        });

        // Initial slide display
        showSlide(currentSlide);
    </script>
{{--    <form action="{{ route('pending') }}" method="get" class="mb-3">--}}
{{--        <div class="input-group">--}}
{{--            <input type="text" name="search_location" class="form-control" placeholder="Search by Location">--}}
{{--            <button type="submit" class="btn btn-primary">Search</button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">Order Id</th>--}}
{{--            <th scope="col">Customer Id</th>--}}
{{--            <th scope="col">Customer Name</th>--}}
{{--            <th scope="col">Location</th>--}}
{{--            <th scope="col">Product Id</th>--}}
{{--            <th scope="col">Products</th>--}}
{{--            <th scope="col">Quantity</th>--}}
{{--            <th scope="col">Price</th>--}}
{{--            <th scope="col">Payment</th>--}}
{{--            <th scope="col">Status</th>--}}
{{--            <th scope="col">Print</th>--}}

{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($order as $oder)--}}
{{--            <tr>--}}
{{--                <form action="{{ route('updates') }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <th scope="row">{{$oder->order_id}}</th>--}}
{{--                    <input type="hidden" name="id" value="{{$oder->order_id}}">--}}
{{--                    <th scope="row">{{$oder->customer_id}}</th>--}}
{{--                    <input type="hidden" name="ids" value="{{$oder->customer_id}}">--}}
{{--                    <td>{{$oder->customer_name}}</td>--}}
{{--                    <td>{{$oder->location}}</td>--}}
{{--                    <th scope="row">{{$oder->product_id}}</th>--}}
{{--                    <td>{{$oder->products}}</td>--}}
{{--                    <td>{{$oder->Quantity}}</td>--}}
{{--                    <td>{{$oder->Price}}</td>--}}
{{--                    <td>{{$oder->Payment}}</td>--}}
{{--                    <td><button type="submit" class="btn btn-primary">{{$oder->order_status}}</button></td>--}}
{{--                    <input type="hidden" name="status" value="Shipping">--}}
{{--                    <td><button type="button" id="printBtn" class="btn btn-primary">Print</button></td>--}}
{{--                </form>--}}

{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}

</div>

<!-- Include Bootstrap JS (Optional, for enhanced functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    const printButtons = document.querySelectorAll(".print-slide-btn");

    printButtons.forEach((button, index) => {
        button.addEventListener("click", function() {
            const printableArea = document.querySelectorAll(".slide")[index];
            const clonedPrintableArea = printableArea.cloneNode(true);

            const printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Print Slide</title>
                    <style>
                        /* Add your print styles here */
                        body {
                            margin: 0;
                            font-family: Arial, sans-serif;
                            background-color: white;
                        }
                        .slide {
                            width: 100%;
                            margin: 0;
                            background-color: white;
                            border: 1px solid #ccc;
                            padding: 20px;
                            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
                        }
                        h2 {
                            font-size: 24px;
                            color: #333;
                        }
                        p {
                            font-size: 16px;
                            color: #666;
                            margin: 10px 0;
                        }
                        /* Add other styles as needed */
                    </style>
                </head>
                <body>
                    ${clonedPrintableArea.outerHTML}
                </body>
                </html>
            `);
            printWindow.document.close();

            // Print using the label printer
            printWindow.print();

            // Close the print window
            printWindow.close();
        });
    });
</script>



</body>
</html>
