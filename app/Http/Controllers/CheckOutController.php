<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.checkout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $params = $request->except('_token', 'payment_method');
//        dd($request->payment_method);
        $total = 0;
        if (Auth::check()) {
            $params['user_id'] = Auth::id();
        }
        foreach (session('cart') as $cart) {
            $total += $cart['total_price'];
        }
        $params['status'] = $request->payment_method;
        $params['total'] = $total;
        $order = new Order();
        $order->fill($params);
        $order->save();
        $order_details = [];
        foreach (session('cart') as $cart) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $cart['product_id'];
            $order_detail->quantity = $cart['quantity'];
            $order_detail->price = $cart['price'];
            $order_detail->total_price = session('totalPrice');
            $order_detail->save();
            $order_details[] = $order_detail;
        }
        SendEmail::dispatch($order, $order_details);
        return redirect()->route('home')->with('success',
            'Đặt hàng thành công! Vui lòng kiểm tra email để xác nhận đơn hàng');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
