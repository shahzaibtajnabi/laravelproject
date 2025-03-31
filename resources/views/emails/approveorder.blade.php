<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Approval Mail</title>
    <style>
        body, h1, p, table {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f4f7fc;
            color: #333;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(45deg, #007BFF, #0056b3);
            color: #ffffff;
            padding: 25px;
            text-align: center;
        }

        .header h1 {
            font-size: 26px;
            margin: 0;
        }

        .email-body {
            padding: 20px;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .email-body h2 {
            color: #007BFF;
            font-size: 22px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table tr td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        .button {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            padding: 12px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #218838;
        }

        .footer {
            background-color: #f1f1f1;
            color: #555;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            border-top: 2px solid #007BFF;
        }

        .footer a {
            color: #007BFF;
            text-decoration: none;
        }

        @media (max-width: 600px) {
            .email-container {
                width: 100%;
            }

            .header h1 {
                font-size: 22px;
            }

            .email-body p, table tr td {
                font-size: 14px;
            }

            .button {
                padding: 10px 18px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="email-container">
    <div class="header">
        <h1>Order Approval Notification</h1>
    </div>

    <div class="email-body">
        <h2>Dear {{$Order['customer_name']}},</h2>
        <p>We are pleased to inform you that your courier request has been successfully approved.</p>
        <p>Details of your shipment are as follows:</p>

        <table>
            <tr>
                <td><strong>Product Name:</strong></td>
                <td>{{$Order['product_desc']}}</td>
            </tr>
            <tr>
                <td><strong>Product Quantity:</strong></td>
                <td>{{$Order['quantity']}}</td>
            </tr>
            <tr>
                <td><strong>Total Amount:</strong></td>
                <td>{{$Order['total_price']}}</td>
            </tr>
            <tr>
                <td><strong>Payment Method:</strong></td>
                <td>{{$Order['payment_method']}}</td>
            </tr>
        </table>

        <h2>{{$Order['customer_name']}}'s Details</h2>
        <table>
            <tr>
                <td><strong>Customer Name:</strong></td>
                <td>{{$Order['customer_name']}}</td>
            </tr>
            <tr>
                <td><strong>Payment Method:</strong></td>
                <td>{{$Order['payment_method']}}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>If you have any questions, feel free to <a href="mailto:support@example.com">contact us</a>.</p>
        <p>Thank you for choosing our services.</p>
    </div>
</div>

</body>
</html>
