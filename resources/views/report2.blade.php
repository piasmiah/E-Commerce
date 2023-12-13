<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce One Month Report</title>
    <meta name="description" content="This is the one-month report for our e-commerce website. It includes sales metrics, product performance, and recommendations for improvement.">
    <meta name="keywords" content="e-commerce, sales report, website metrics, product performance, recommendations">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: white;
            color: #fff;
            text-align: center;
            padding: 7px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }

        p {
            text-align: center;
            color: #555;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .print-button {
            display: block;
        }

        @media print {
            .print-button {
                display: none;
            }
        }

        .print-only {
            display: none;
        }

        @media print {
            body {
                font-size: 12pt;
            }
            .print-only {
                display: block;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>Welcome to Our Ecommerce Website</h1>
    <p>Welcome to our e-commerce platform, where we bring together a wide range of high-quality products and services to cater to your every need. Our mission is to provide a seamless and enjoyable online shopping experience, offering an extensive selection of products in various categories, from electronics to fashion, home & garden to gadgets. We take pride in ensuring that each item we offer meets the highest standards of quality and affordability.

        <!-- Our commitment to customer satisfaction is at the core of our business. We not only provide a diverse product catalog but also prioritize excellent customer service, secure payment options, and swift delivery. Our team works tirelessly to stay up to date with the latest trends and technologies to make your shopping experience as convenient as possible. -->

        <!-- Whether you're seeking the latest tech gadgets, stylish clothing, or practical home and garden essentials, we've got you covered. Explore our website, discover the perfect products for your lifestyle, and shop with confidence, knowing that you're in good hands. Thank you for choosing us as your trusted ecommerce destination.</p> -->
</header>

<div class="container">
    <h1>Ecommerce Report <strong>{{$currentDate}}</strong></h1>

    <table class="table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity Sold</th>
        </tr>
        </thead>
        <tbody>
        @foreach($daily as $top)
        <tr>
            <td>{{$top->products}}</td>
            <td>{{$top->total_quantity}}</td>
        </tr>
        @endforeach


        </tbody>
    </table>
    <h1>Ecommerce Seller Report <strong>{{$currentDate}}</strong></h1>
    <table class="table">
        <thead>
        <tr>
            <th>Store Name</th>
            <th>Quantity Sold</th>
        </tr>
        </thead>
        <tbody>
        @foreach($daily2 as $top)
            <tr>
                <td>{{$top->products}}</td>
                <td>{{$top->total_quantity}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>
