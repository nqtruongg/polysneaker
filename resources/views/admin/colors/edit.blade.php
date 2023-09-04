@extends('admin.layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.colors.update', ['id' => $model->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Tên Màu Sắc:</label>
                            <input type="text" value="{{$model->color_name}}" class="form-control" name="color_name">
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

