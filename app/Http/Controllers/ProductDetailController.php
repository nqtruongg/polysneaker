<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index(string $id){
        $data = Product::query()->findOrFail($id);
        return view('client.product_detail', compact('data'));
    }
}
