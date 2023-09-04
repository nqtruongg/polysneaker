<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);
        $categories = Category::all();

        return view('client.product', compact('products', 'categories'));
    }

    public function filterByCategory(Request $request)
    {
        $categoryId = $request->category_id;
        if(empty($categoryId)) {
            $products = Product::paginate(8);
        } else {
            $products = Product::where('category_id', $categoryId)->paginate(8);
        }
        $categories = Category::all();

        return view('client.product', compact('products', 'categories'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $categoryId = $request->input('category_id');

        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('product_name', 'like', '%'.$keyword.'%');
        }

        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return view('client.product', compact('products', 'categories'));
    }

}
