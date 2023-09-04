<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    const OBJECT = 'admin.categories';
    const DOT = '.';
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $model = new Category();
        $model->fill($request->all());
        $model->save();
      return redirect()->route(self::OBJECT . self::DOT . 'index')->with('success', 'Thêm danh mục thành công');


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['model' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {

      $model = Category::query()->findOrFail($id);
      $model->fill($request->all());
      $model->save();
      return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
