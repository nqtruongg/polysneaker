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
    <h1 class="mt-4">BILL {{$data->id}}</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Người nhận:</strong> {{ $data->name }}</p>
            <p><strong>Địa chỉ giao hàng:</strong> {{ $data->address }}</p>
            <p><strong>Số điện thoại:</strong> {{ $data->phone }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Tổng tiền:</strong> {{ number_format($data->total) }} VND</p>
            @if ($data->status == 3)
                <p><strong>Trạng thái:</strong> <span class="badge bg-success">Giao hàng thành công</span></p>
            @endif
        </div>
    </div>

    <hr>

    <p>Các sản phẩm đã mua:</p>

    <table class="table">
        <thead>
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Đơn Giá</th>
            <th>Tổng Tiền</th>

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
