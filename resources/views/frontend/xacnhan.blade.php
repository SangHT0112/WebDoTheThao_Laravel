<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .email-body {
            padding: 20px;
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }

        .order-details {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details table th, .order-details table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .order-details table th {
            background-color: #f2f2f2;
        }

        .cta-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }

        .email-footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #777;
        }

        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        Xác nhận thành công !
    </div>

    <div class="email-body">
        <p>Đơn hàng sẽ sớm được giao đến bạn.</p>

    </div>

    <div class="email-footer">
        <p>Bạn nhận được email này vì bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>
    </div>
</div>
</body>
</html>
