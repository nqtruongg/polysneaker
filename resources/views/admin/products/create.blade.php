@extends('admin.layout');
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Tên Sản Phẩm:</label>
                                <input type="text" class="form-control"  name="product_name">
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Giá Tiền:</label>
                                <input type="text" class="form-control"  name="price">
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Mô Tả:</label>
{{--                                <input type="text" class="form-control"  name="describe">--}}
                                <textarea name="describe" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Hình Ảnh:</label>
                                <input type="file" class="form-control" id="image"  name="image">
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Danh Mục:</label>
                               <select name="category_id" class="form-control">
                                 @foreach($category as $data)
                                   <option value="{{$data->id}}">
                                   {{$data->category_name}}
                                   </option>
                                   @endforeach
                               </select>
                            </div>


                            <div class="form-check">
                                <label class="form-label">Kích Cỡ:</label>
                                <br>
                                @foreach($size as $data)
                                <input class="form-check-input" type="checkbox" name="sizes[]" value="{{$data->id}}">
                               <p class="form-check-label" >  {{$data->size_name}} </p>
                                @endforeach
                            </div>

                            <div class="form-check">
                                <label  class="form-label">Màu Sắc:</label>
                                <br>
                                @foreach($color as $data)
                                    <input  class="form-check-input"  type="checkbox" name="colors[]" value="{{$data->id}}">
                                  <p  class="form-check-label" >  {{$data->color_name}}</p>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm Mới</button>
                        </form>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
        <!--  /Traffic -->
        <div class="clearfix"></div>






@endsection
