<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .dashboard-card
        {
            padding: 20px;
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-4 mb-4">Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="dashboard-card">
                <h2><a href="totalsells">Total Sales</a></h2>
                <h4><strong>Tk. {{$total}}</strong></h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card">
                <h2>Total Pending Orders</h2>
                <h4><strong>{{$pen}}</strong></h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card">
                <h2>Total Shipping Orders</h2>
                <h4><strong>{{$ship}}</strong></h4>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card">
                <h2>Total Deliver Orders</h2>
                <h4><strong>{{$total2}}</strong></h4>
            </div>
        </div>
    </div>
</div>
</body>
</html>
