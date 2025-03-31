@extends('website.layouts.main')

@section('main_section')

{{-- <h2>Track Your Courier</h2>

<form action="{{ route('track-courier') }}" method="get">
    @csrf
    <div class="form-group">
        <label for="tracking_number">Enter Tracking Number</label>
        <input type="text" name="tracking_number" id="tracking_number" class="form-control"
            required>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Track</button>
</form> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Track Your Courier</title>
    <!-- Add any additional head content like CSS here -->
    <link rel="stylesheet" href="path/to/bootstrap.min.css"> <!-- Example for Bootstrap CSS -->
    <link rel="stylesheet" href="path/to/your/custom.css"> <!-- Your custom styles -->
    <style>
        /* General Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f7fa;
    margin: 0;
    padding: 0;
}

.container {
    width: 60%;
    margin: 50px auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #4CAF50;
    margin-bottom: 30px;
}

form {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: bold;
}

input.form-control {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 4px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

.alert {
    margin-top: 20px;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: left;
}

table th {
    background-color: #f4f7fa;
}

    </style>
</head>
<body>

    <div class="container">
        <h2>Track Your Order</h2>

        <form action="{{ route('track-order') }}" method="get">
            @csrf
            <div class="form-group">
                <label for="tracking_number">Enter Tracking Number</label>
                <input type="text" name="tracking_number" id="tracking_number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Track</button>
        </form>

        <div id="trackingInfo">
            <!-- Data will be shown here after the AJAX request -->
        </div>
    </div>

    <!-- Add your script tags here, before the closing </body> tag -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery CDN -->
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('form').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from reloading the page

                var trackingNumber = $('#tracking_number').val();

                if (trackingNumber === "") {
                    alert("Please enter a tracking number.");
                    return;
                }

                // AJAX request to Laravel route
                $.ajax({
                    url: "{{ route('track-order') }}", // Ensure this route exists in web.php
                    method: "GET", // Use GET if your Laravel route supports it
                    data: { tracking_number: trackingNumber },
                    success: function(response) {
                        if (response.error) {
                            $('#trackingInfo').html('<div class="alert alert-danger">' + response.error + '</div>');
                        } else {
                            $('#trackingInfo').html(`
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Tracking Number</th>
                                        <td>${response.Order.tracking_number}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Name</th>
                                        <td>${response.Order.customer_name}</td>
                                    </tr>
                                    <tr>
                                        <th>Product</th>
                                        <td>${response.Order.product_name}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Price</th>
                                        <td>${response.Order.total_price}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>${response.Order.payment_method}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>${response.Order.Ostatus.charAt(0).toUpperCase() + response.Order.Ostatus.slice(1)}</td>
                                    </tr>
                                </table>
                            `);
                        }
                    },
                    error: function(xhr) {
                        $('#trackingInfo').html('<div class="alert alert-danger">Something went wrong. Please try again.</div>');
                    }
                });
            });
        });
    </script>

</body>
</html>



@endsection
