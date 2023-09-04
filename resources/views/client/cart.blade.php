@extends('client.layout')
@section('content')

    <div class="container my-3">
        <table class="table">
            <thead>
                <tr>
                    <th class="scope">Xóa</th>
                    <th class="scope">Ảnh</th>
                    <th class="scope">Sản phẩm</th>
                    <th class="spoce">Màu Sắc</th>
                    <th class="scope">Kích Cỡ</th>
                    <th class="scope">Giá</th>
                    <th class="scope">Số lượng</th>
                    <th class="scope">Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @if(session()->has('cart'))
                    @php $i = 1;
//dd(session('cart'));
@endphp
                    @foreach(session('cart') as $cart)
                        <tr>
                            <td><a href="{{ route('removeProduct', ['id' => $cart['product_id']]) }}" class="btn btn-danger"
                                   onclick="return confirm('Are you sure?')">Delete</a></td>
                            <td>
                                <img src="{{ asset($cart['image']) }}" alt="" width="100" height="100">
                            </td>
                            <td>{{ $cart['product_name'] }}</td>
                            <td>{{ $cart['color'] }}</td>
                            <td>{{ $cart['size'] }}</td>
                            <td>{{ number_format($cart['price'])  }} vnd</td>
                            <td style="text-align: center;">
                                @if($cart['quantity'] != 1)
                                    <a href="{{ route('downNumber', ['id' => $cart['product_id']]) }}">-</a>
                                @endif
                                {{ $cart['quantity'] }}
                                <a href="{{ route('upNumber', ['id' => $cart['product_id']]) }}">+</a>
                            </td>
                            <td>{{ number_format($cart['total_price']) }} vnd</td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="6">Khong co san pham!</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" style="color: green">Tổng số lượng sản phẩm: {{ session()->has('totalQuantity') ? session('totalQuantity') : 0 }} sản phẩm</th>
                    <th colspan="4" style="color: red">Tổng tiền: {{ session()->has('totalPrice') ? number_format(session('totalPrice')) : 0 }} vnd</th>
                    <th>
                        @if(session()->has('totalQuantity') && session('totalQuantity')  > 0)
                            <a href="{{route('checkout')}}" class="btn btn-success">Thanh toán</a>
                        @endif
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
