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
        Xác nhận đơn hàng của bạn
    </div>

    <div class="email-body">
        <p>Chào bạn,</p>
        <p>Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi! Đây là thông tin xác nhận về đơn hàng của bạn:</p>

        <div class="order-details">
            <h3>Chi tiết đơn hàng</h3>
            <table>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
                @foreach($getProducts as $products)
                <tr>
                    <td>{{$products->name}}</td>
                    <td>{{$carts[$products->id]}}</td>
                    @if($products->price_sale>0)
                    <td>{{ number_format($products->price_sale, 0, '', '.') }} VNĐ</td>
                    @else
                        <td>{{ number_format($products->price, 0, '', '.') }} VNĐ</td>
                    @endif
                </tr>
                @endforeach
                <tr>
                    <td><strong>Tổng cộng</strong></td>
                    @if($khuyenmai < 1 && $khuyenmai >0)
                    <td> Giảm:  {{$khuyenmai * 100}} %</td>
                    @else
                        <td> Giảm: {{ number_format($khuyenmai, 0, '', '.') }} VNĐ</td>
                    @endif
                    <td><strong>{{ number_format($total, 0, '', '.') }} VNĐ</strong></td>
                </tr>
            </table>
        </div>

        <p><strong>Phương thức thanh toán:</strong> Thanh toán khi nhận hàng</p>
        <p><strong>Địa chỉ giao hàng:</strong>{{$address}}</p>
        <p style="color: red;font-size: 10px">( Nếu bạn không xác nhận đơn hàng trong 24h tới, đơn hàng sẽ bị hủy! )</p>
        <a href="{{route('accept',['id'=>$customer , 'token'=>$token])}}" class="cta-button" target="_blank">Xác nhận đơn hàng</a>
    </div>

    <div class="email-footer">
        <p>Bạn nhận được email này vì bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>
    </div>
</div>
</body>
</html>
