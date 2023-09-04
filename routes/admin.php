<?php
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminColorController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSizeController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;


Route::middleware('check.admin')->group(function (){
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
//Route::get('admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories');
//Route::resource('admin/categories', AdminCategoryController::class);

    //CRUD CATEGORY
    Route::resource('admin/categories', AdminCategoryController::class)->names('admin.categories');
//Route::get('admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');

// CRUD SIZE
    Route::get('/admin/sizes/index', [AdminSizeController::class, 'index'])->name('admin.sizes.index');
    Route::get('admin/sizes/create', [AdminSizeController::class, 'create'])->name('admin.sizes.create');
    Route::post('/admin/sizes/store', [AdminSizeController::class, 'store'])->name('admin.sizes.store');
    Route::get('/admin/sizes/edit/{id}', [AdminSizeController::class, 'edit'])->name('admin.sizes.edit');
    Route::put('/admin/sizes/update/{id}', [AdminSizeController::class, 'update'])->name('admin.sizes.update');
    Route::delete('/admin/sizes/destroy/{id}', [AdminSizeController::class, 'destroy'])->name('admin.sizes.destroy');

// CRUD COLOR
    Route::get('/admin/colors/index', [AdminColorController::class, 'index'])->name('admin.colors.index');
    Route::get('/admin/colors/create', [AdminColorController::class, 'create'])->name('admin.colors.create');
    Route::post('/admin/colors/store', [AdminColorController::class, 'store'])->name('admin.colors.store');
    Route::get('/admin/colors/edit/{id}', [AdminColorController::class, 'edit'])->name('admin.colors.edit');
    Route::put('/admin/colors/update/{id}', [AdminColorController::class, 'update'])->name('admin.colors.update');
    Route::delete('/admin/colors/destroy/{id}', [AdminColorController::class, 'destroy'])->name('admin.colors.destroy');

//CRUD PRODUCT
    Route::get('/admin/products/index', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/update/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/destroy/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

//CRUD ROLES
    Route::get('/admin/roles/index', [AdminRoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/admin/roles/create', [AdminRoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/admin/roles/store', [AdminRoleController::class, 'store'])->name('admin.roles.store');
    Route::delete('/admin/roles/destroy/{id}', [AdminRoleController::class, 'destroy'])->name('admin.roles.destroy');


    //CRUD USER
    Route::get('/admin/users/index', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/destroy/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    //CRUD ORDER
    Route::get('/admin/orders/index', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/admin/orders/update/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');

    //In hoa don
    Route::get('/admin/orders/print/{id}', [\App\Http\Controllers\Admin\AdminPrintController::class, 'print'])->name('admin.orders.print');

});


