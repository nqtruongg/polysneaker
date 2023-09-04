<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class AdminSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Size::all();
        return view('admin.sizes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {
        $model = new Size();
        $model->fill($request->all());
        $model->save();
        return redirect()->route('admin.sizes.index')->with('success', 'Thêm Size thành công');
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
    public function edit(Request $request)
    {
        $model = Size::find($request->id);
        return view('admin.sizes.edit', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, string $id)
    {
        $model = Size::query()->findOrFail($id);
        $model->fill($request->all());
        $model->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Size::query()->findOrFail($id);
        $model->delete();
        return back();
    }
}
