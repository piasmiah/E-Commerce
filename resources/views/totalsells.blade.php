<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Sales Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add any additional custom CSS styling here */
    </style>
</head>
<body>
<div class="container mt-4">
    <h2>Total Sales Table</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Product</th>
            <th>Quantity Sold</th>
            <th>Unit Price</th>
            <th>Total Revenue</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sells as $sel)
            <tr>
                <td>{{ $sel->pro_id }}</td>
                <input type="hidden" name="ids" value="{{ $sel->pro_id }}">
                <td>{{ $sel->pro_name }}</td>

                <td>{{ $sel->Quantity_Sold }}</td>

                <td>Tk. {{ $sel->price }}</td>
                <td>Tk. {{ $sel->price * $sel->Quantity_Sold }}</td>
            </tr>
        @endforeach
        <!-- Add more rows for other products as needed -->
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><strong>Total Revenue</strong></td>
            <td colspan="1"><strong>Tk.
                <?php
                $grandTotal = 0;
                foreach ($sells as $sel) {
                    $grandTotal += $sel->price * $sel->Quantity_Sold;
                }
                echo number_format($grandTotal);
                ?>
                </strong>

            </td>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
