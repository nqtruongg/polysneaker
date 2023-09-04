<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        return view('client.cart');
    }

    public function addToCart(Request $request, $id)
    {
//        dd($request->all());
        $color_id = $request->color;
        $size_id = $request->size;

        $productId = $id;
        $product = DB::table('products')->where('id', $productId)->first();
        $name_color = DB::table('colors')->where('id',$color_id)->select('color_name')->first();
        $name_size = DB::table('sizes')->where('id',$size_id)->select('size_name')->first();

        // Kiểm tra xem session 'cart' đã tồn tại hay chưa
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($cart[$productId])) {
            // Tăng số lượng sản phẩm và cập nhật giá tiền
            $cart[$productId]['quantity']++;
            $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới
            $cart[$productId] = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'color' => $name_color->color_name,
                'size' => $name_size->size_name,
                'quantity' => 1,
                'image' => $product->image,
                'total_price' => $product->price, // Tổng giá tiền ban đầu khi thêm sản phẩm mới
            ];
        }

        // Cập nhật tổng tiền của giỏ hàng
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['total_price'];
            $totalQuantity += $item['quantity'];
        }

        // Lưu giỏ hàng và tổng tiền vào session
        session(['cart' => $cart, 'totalPrice' => $totalPrice, 'totalQuantity' => $totalQuantity]);

//        session()->forget('cart');

        return redirect()->route('products.detail', $id)->with(['success' => 'Sản phẩm đã được thêm vào giỏ hàng']);
    }

    public function upNumber($id){
        $productId = $id;
        $product = DB::table('products')->where('id', $productId)->first();

        // Kiểm tra xem session 'cart' đã tồn tại hay chưa
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($cart[$productId])) {
            // Tăng số lượng sản phẩm và cập nhật giá tiền
            $cart[$productId]['quantity']++;
            $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới
            $cart[$productId] = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
                'total_price' => $product->price, // Tổng giá tiền ban đầu khi thêm sản phẩm mới
            ];
        }

        // Cập nhật tổng tiền của giỏ hàng
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['total_price'];
            $totalQuantity += $item['quantity'];
        }

        // Lưu giỏ hàng và tổng tiền vào session
        session(['cart' => $cart, 'totalPrice' => $totalPrice, 'totalQuantity' => $totalQuantity]);

        return redirect()->back();
    }

    public function downNumber($id){
        $productId = $id;
        $product = DB::table('products')->where('id', $productId)->first();

        // Kiểm tra xem session 'cart' đã tồn tại hay chưa
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($cart[$productId])) {
            // Tăng số lượng sản phẩm và cập nhật giá tiền
            $cart[$productId]['quantity']--;
            $cart[$productId]['total_price'] -= $cart[$productId]['price'];
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới
            $cart[$productId] = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
                'total_price' => $product->price, // Tổng giá tiền ban đầu khi thêm sản phẩm mới
            ];
        }

        // Cập nhật tổng tiền của giỏ hàng
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['total_price'];
            $totalQuantity += $item['quantity'];
        }

        // Lưu giỏ hàng và tổng tiền vào session
        session(['cart' => $cart, 'totalPrice' => $totalPrice, 'totalQuantity' => $totalQuantity]);

        return redirect()->back();
    }

    public function removeProduct($id)
    {
        $productId = $id;
        // Kiểm tra xem session 'cart' đã tồn tại hay chưa
        $cart = session()->get('cart', []);


        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        if (isset($cart[$productId])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$productId]);

            // Cập nhật lại tổng tiền giỏ hàng
            $totalPrice = 0;
            $totalQuantity = 0;
            foreach ($cart as $item) {
                $totalPrice += $item['total_price'];
                $totalQuantity += $item['quantity'];
            }

            // Lưu giỏ hàng và tổng tiền vào session
            session(['cart' => $cart, 'totalPrice' => $totalPrice, 'totalQuantity' => $totalQuantity]);
        }
        return redirect()->back();
    }
}
