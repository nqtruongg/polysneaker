<!DOCTYPE html>
<html>
<head>
    <title>Hóa đơn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-4">BILL {{$order->id}}</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Người nhận:</strong> {{ $order->name }}</p>
            <p><strong>Địa chỉ giao hàng:</strong> {{ $order->address }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total) }} VND</p>
            @if ($order->status == 3)
                <p><strong>Trạng Thái:</strong> <span class="badge bg-success">Giao hàng thành công</span></p>
            @endif
        </div>
    </div>

    <hr>

    <p>Các mục hàng đã nhận:</p>

    <table class="table">
        <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Tổng tiền</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($order_details as $item)

            <tr>
                <td>{{ $item->product->product_name }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ number_format($item['price']) }} VND</td>
                <td>{{ number_format($item['quantity'] * $item['price']) }} VND</td>



            </tr>
        @endforeach
        <th  style="color: red; font-weight: bold;"> Tổng giá trị đơn hàng: {{ number_format($item['total_price']) }} VND</th>
        </tbody>
    </table>
</div>
</body>
</html>
