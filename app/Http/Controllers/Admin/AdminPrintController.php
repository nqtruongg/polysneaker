<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class AdminPrintController extends Controller
{
    public function print($id){
            $order = Order::findorFail($id);
            $order_details = OrderDetail::all()->where('order_id', $id);
            $pdf = new Dompdf();
            $view = view('admin.order.invoice', compact('order', 'order_details'))->render();
//        dd($view);
            $pdf->loadHtml($view);
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();
            return $pdf->stream('invoice.pdf');
    }
}
