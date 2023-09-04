@extends('admin.layout');
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.orders.update', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Tên Khách Hàng:</label>
                            <input type="text" value="{{$model->name}}" class="form-control" name="name" readonly disabled>
                        </div>
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Địa chỉ nhận hàng:</label>
                            <input type="text" value="{{$model->address}}" class="form-control" name="address" readonly disabled>
                        </div>
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Số điện thoại:</label>
                            <input type="text" value="{{$model->phone}}" class="form-control" name="phone" readonly disabled>
                        </div>
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Tổng tiền:</label>
                            <input type="text" value="{{number_format($model->total)}} vnd" class="form-control" name="total" readonly disabled>
                        </div>
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Trạng thái đơn hàng:</label>
                            <select name="status" class="form-control">
                                <option value="1" @if($model->status == 1) selected @endif>Chờ xác nhận</option>
                                <option value="2" @if($model->status == 2) selected @endif>Đang giao hàng</option>
                                <option value="3" @if($model->status == 3) selected @endif>Đã giao hàng</option>
                                <option value="4" @if($model->status == 4) selected @endif>Hủy đơn hàng</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
    <!--  /Traffic -->
    <div class="clearfix"></div>






@endsection


