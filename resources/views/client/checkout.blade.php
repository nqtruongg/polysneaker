@extends('client.layout')
@section('content')

    <div id="header-ontop" class="is-sticky"></div>
    <div class="main-container no-sidebar">
        <div class="container">
            <div class="main-content">
                <div class="page-title">
                    <h3 style="font-weight: bolder">Thanh Toán</h3>
                </div>
                <form action="{{route('checkout.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-checkout">
                                <h5 class="form-title" style="font-weight: bold; font-size: 20px">Thông Tin Người Nhận</h5>
                                <p><input type="text" placeholder="Họ Và Tên" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}"></p>
                                <p><input type="text" placeholder="Email" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}"></p>
                                <p><input type="text" placeholder="Địa Chỉ" name="address" value="{{ Auth::check() ? Auth::user()->address : '' }}"></p>
                                <p><input type="text" placeholder="Số điện thoại" name="phone" value="{{ Auth::check() ? Auth::user()->phone : '' }}"></p>
                            </div>
                            <div class="form-checkout checkout-payment">
                                <h5 class="form-title"  style="font-weight: bold; font-size: 20px">Hình Thức Thanh Toán</h5>

                                <div class="payment_methods">

                                    <div class="payment_method">
                                        <label><input name="payment_method" type="radio" value="1">Thanh Toán Khi Nhận Hàng</label>
                                    </div>

                                    <div class="payment_method">
                                        <label><input name="payment_method" type="radio" value="2">Chuyển Khoản Ngân Hàng</label>
                                    </div>
                                    <div id="qr_code"></div>

                                </div>
                            </div>
                        </div>
                        <div class="form-checkout order">
                            <h5 class="form-title"  style="font-weight: bold; font-size: 20px">Đơn Hàng Của Bạn</h5>
                            <table class="shop-table order">
                                <thead class="shop-table-head">
                                <tr class="product-categories">
                                    <th class="product-name" style="font-weight: bolder; font-size: 16px"> Tên Sản Phẩm</th>
                                    <th class="total">Giá Tiền</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach(session('cart') as $cart)
                                    <tr>
                                        <td class="product-name" style="font-weight: bold">{{$cart['product_name'] }}</td>
                                        <td class="total"><span
                                                class="price" style="color: red; font-weight: bold">{{ number_format($cart['total_price']) }} vnd</span></td>
                                    </tr>
                                @endforeach
                                <tr class="order-total">
                                    <td class="subtotal" style="font-weight: bolder">Tổng Tiền</td>
                                    <td class="total"><span
                                            class="price" style="font-weight: bolder; color: darkgoldenrod">{{number_format(session('totalPrice'))}} vnd</span></td>
                                </tr>

                                </tbody>
                            </table>
                            <button class="button btn-primary medium" type="submit">Tiến Hành Thanh Toán</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="margin-top-10">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-origami28"></i></div>
                        <div class="content">
                            <h4 class="title">GIAO HÀNG MIỄN PHÍ TOÀN VIỆT NAM</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-curvearrows9"></i></div>
                        <div class="content">
                            <h4 class="title">ĐỔI TRẢ NHANH CHÓNG</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="element-icon style2">
                        <div class="icon"><i class="flaticon flaticon-headphones54"></i></div>
                        <div class="content">
                            <h4 class="title">HỖ TRỢ 24/7</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        // Lấy phần tử chứa ảnh QR
        var qrCode = document.getElementById("qr_code");

        // Lấy tất cả các phương thức thanh toán
        var paymentMethods = document.getElementsByName("payment_method");

        // Bắt sự kiện khi người dùng chọn phương thức thanh toán
        for (var i = 0; i < paymentMethods.length; i++) {
            paymentMethods[i].addEventListener("change", function() {
                // Nếu người dùng chọn phương thức thanh toán là "Chuyển khoản ngân hàng"
                if (this.value == "2") {
                    // Hiển thị phần tử chứa ảnh QR
                    qrCode.innerHTML = '<img src="{{asset('images/qr.jpg')}}" alt="Visa card">';
                } else {
                    // Ẩn phần tử chứa ảnh QR
                    qrCode.innerHTML = '';
                }
            });
        }
    </script>

@endsection
{{--    <div class="footer-bottom">--}}
{{--        <div class="container">--}}
{{--            <div class="payment">--}}
{{--                <div class="head"><span>We Accept</span><span class="PlayfairDisplay">Online Payment Be Secured</span></div>--}}
{{--                <div class="list">--}}
{{--                    <a href="#" class="item"><img src="images/payments/1.png" alt=""></a>--}}
{{--                    <a href="#" class="item"><img src="images/payments/2.png" alt=""></a>--}}
{{--                    <a href="#" class="item"><img src="images/payments/3.png" alt=""></a>--}}
{{--                    <a href="#" class="item"><img src="images/payments/4.png" alt=""></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

<a href="#" class="scroll_top" title="Scroll to Top" style="display: block;"><i class="fa fa-arrow-up"></i></a>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/Modernizr.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/lightbox.min.js"></script>
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="js/masonry.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

