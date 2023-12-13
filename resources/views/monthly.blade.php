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
    <p>As a seller on our platform, <strong>{{ $id->seller_name }}</strong>, examining the one-month sales report for your products sold via <strong>E-commerce</strong>, we provide comprehensive insights into your recent performance. This report offers valuable analytics and data reflecting your sales trends, customer engagement, and product performance, aiding in refining strategies for continued success on our platform.
    </p>
        <!-- Our commitment to customer satisfaction is at the core of our business. We not only provide a diverse product catalog but also prioritize excellent customer service, secure payment options, and swift delivery. Our team works tirelessly to stay up to date with the latest trends and technologies to make your shopping experience as convenient as possible. -->

        <!-- Whether you're seeking the latest tech gadgets, stylish clothing, or practical home and garden essentials, we've got you covered. Explore our website, discover the perfect products for your lifestyle, and shop with confidence, knowing that you're in good hands. Thank you for choosing us as your trusted ecommerce destination.</p> -->
</header>

<div class="container">
    <h1>Ecommerce Report <strong>{{$currentMonth}}</strong></h1>

    <table class="table">
        <thead>
        <tr>
            <th>Metric</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Total sales</td>
            <td>${{$totalsales}} (last update at {{$currentDate}})</td>
        </tr>
        <tr>
            <td>Revenue by product category</td>
            <td>
                @foreach($categorySold as $category)
                    {{$category->category}}: ${{ number_format($category->total_price, 2) }},
                @endforeach
            </td>
        </tr>
        <tr>
            <td>Average order value</td>
            <td>$0</td>
        </tr>
        </tbody>
    </table>
    <h2>Product Category Performance</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Category Name</th>
            <th>Quantity Sold</th>
            <th>Revenue</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorySold as $category)
            <tr>
                <td>{{$category->category}}</td>
                <td>{{$category->total_quantity_sold}}</td>
                <td>${{ number_format($category->total_price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h2>Website Traffic</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Metric</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Website traffic</td>
            <td>{{$countvisit}} visitors</td>
        </tr>
        </tbody>
    </table>
    <h2>Maximam Sold Products</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Product ID</th>
            <th>Quantity Sold</th>
            <th>Rating</th>
        </tr>
        </thead>
        <tbody>
        @foreach($topProducts as $top)
            <tr>
                <td>{{$top->pro_des}}</td>
                <td>{{$top->pro_id}}</td>
                <td>{{$top->total_sold}}</td>
                <td>{{$top->avg_rating}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Minimum Sold Products</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Product ID</th>
            <th>Quantity Sold</th>
            <th>Rating</th>
        </tr>
        </thead>
        <tbody>
        @foreach($topProducts2 as $top)
            <tr>
                <td>{{$top->pro_des}}</td>
                <td>{{$top->pro_id}}</td>
                <td>{{$top->total_sold}}</td>
                <td>{{$top->avg_rating}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <h2>Conclusion</h2>
    <p>Overall, sales were good for the month of {{$currentMonth}}. Total sales were ${{$totalsales}}. The top-selling product category was
        @foreach($categorySold as $category)
            {{$category->category}},
        @endforeach
        The least-selling products were phone cases, t-shirts, and plant pots.</p>
    <h2>Recommendations</h2>
    <ul>
        <li>Focus on marketing the electronics product category, as it is the top-selling category.</li>
        <li>Consider offering discounts or promotions on the least-selling products to boost sales.</li>
        <li>Analyze customer data to identify trends and areas for improvement.</li>
    </ul>
    <button class="btn btn-secondary print-button" onclick="window.print()">Print</button>

</div>
</body>
</html>

