@extends('admin.layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.products.update', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Tên Sản Phẩm:</label>
                            <input type="text" value="{{$model->product_name}}" class="form-control" name="product_name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Giá:</label>
                            <input type="text" value="{{$model->price}}" class="form-control" name="price">
                        </div>
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Mô Tả:</label>
                            <input type="text" value="{{$model->describe}}" class="form-control" name="describe">

                        </div>
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Hình Ảnh:</label>
                            <input type="file" class="form-control" id="image"  name="image" value="">
                        </div>
                        <img src="{{ asset($model->image) }}" alt="" width="100" height="100">
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Danh Mục:</label>
                            <select name="category_id" class="form-control">
                                @foreach($category as $data)
                                    <option value="{{$data->id}}"
                                    @selected($data->id == $model->category_id)
                                    >
                                        {{$data->category_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <label  class="form-label">Kích Thước:</label>
                            @foreach($size as $data)
                                <input type="checkbox" name="sizes[]" value="{{$data->id}}"
                                @if($model->sizes->contains($data->id))
                                    checked
                                @endif
                                >
                                {{$data->size_name}}
                            @endforeach
                        </div>

                        <div class="mb-3 mt-3">
                            <label  class="form-label">Màu sắc:</label>
                            @foreach($color as $data)
                                <input type="checkbox" name="colors[]" value="{{$data->id}}"
                                       @if($model->colors->contains($data->id))
                                           checked
                                    @endif
                                >
                                {{$data->color_name}}
                            @endforeach
                        </div>
{{--                        <div class="mb-3 mt-3">--}}
{{--                            <label  class="form-label">Category ID:</label>--}}
{{--                            <input type="text" value="{{$model->category_id}}" class="form-control" name="category_id">--}}
{{--                        </div>--}}
{{--                        <div class="mb-3 mt-3">--}}
{{--                            <label  class="form-label">Size Id:</label>--}}
{{--                            <input type="text" value="{{$model->size_id}}" class="form-control" name="size_id">--}}
{{--                        </div>--}}
{{--                        <div class="mb-3 mt-3">--}}
{{--                            <label  class="form-label">Color Id:</label>--}}
{{--                            <input type="text" value="{{$model->color_id}}" class="form-control" name="color_id">--}}
{{--                        </div>--}}

                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
    <!--  /Traffic -->
    <div class="clearfix"></div>






@endsection

