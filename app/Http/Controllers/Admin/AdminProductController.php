<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();

        return view('admin.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $size = Size::all();
        $color = Color::all();
        return view('admin.products.create', compact('category', 'size', 'color'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request,)
    {

        $model = new Product();
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $model->image = upload_file('products', $request->file('image'));
        }
        $model->save();
        $model->sizes()->attach($request->sizes);
        $model->colors()->attach($request->colors);

        return redirect()->route('admin.products.index')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $model = Product::with(['sizes', 'colors'])->findOrFail($request->id);
        $category = Category::all();
        $size = Size::all();
        $color = Color::all();
//        dd($model);
        return view('admin.products.edit',
            ['model' => $model, 'category' => $category, 'size' => $size, 'color' => $color]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {

        $model = Product::query()->findOrFail($id);
        $model->fill($request->except('image'));
        $oldImage = DB::table('products')->select('image')->where('id', $id)->first()->image;

        if ($request->hasFile('image')) {
            $model->image = upload_file('products', $request->file('image'));
            delete_file($oldImage);
        }

        $model->save();
        $model->sizes()->detach();
        $model->colors()->detach();
        $model->sizes()->attach($request->sizes);
        $model->colors()->attach($request->colors);
        return redirect()->route('admin.products.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Product::query()->findOrFail($id);
        $model->delete();
        return back();
    }
}
