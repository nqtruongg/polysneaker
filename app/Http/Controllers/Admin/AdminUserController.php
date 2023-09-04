<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //
    public function index()
    {
        $data = User::all();
        return view('admin.users.index', compact('data'));
    }

    public function create()
    {

    }

    public function show(string $id)
    {

    }

    public function edit(Request $request)
    {
        $model = User::query()->findOrFail($request->id);
        $role = Role::all();
        return view('admin.users.edit', compact('model', 'role'));
    }

    public function update(Request $request, string $id)
    {
        $model = User::query()->findOrFail($id);
        $model->fill($request->all());
        $model->save();
        return redirect()->route('admin.users.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(string $id)
    {
      $model = User::query()->findOrFail($id);
      $model->delete();
      return redirect()->route('admin.users.index')->with('success', 'Xóa thành công!');
    }
}
