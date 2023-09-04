@extends('admin.layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">   <a href="{{route('admin.products.create')}}"><button class="btn btn-primary">Thêm Mới Sản Phẩm </button></a></h4>
                    <table id="products" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Tiền</th>
                            <th>Mô Tả</th>
                            <th>Danh Mục</th>
                            <th>Hình Ảnh</th>
                            <th>Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->id}}</td>
                                <td>{{$dt->product_name}}</td>
                                <td>{{$dt->price}}</td>
                                <td>{{$dt->describe}}</td>
                                <td>{{$dt->category->category_name}}</td>


                                <td>
                                    <img src="{{asset($dt->image)}}" alt="" width="100px">
                                </td>
                                <td>
                                    <a href="{{route('admin.products.edit',['id'=>$dt->id])}}"><button class="btn btn-primary">Chỉnh Sửa</button></a>

                                    <button class="btn btn-danger" onclick="if(confirm('Are you sure?')) {document.getElementById('item-{{$dt->id}}').submit()}">
                                        Xóa
                                    </button>
                                    <form action="{{route('admin.products.destroy',$dt)}}" id="item-{{$dt->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
    <!--  /Traffic -->
    <div class="clearfix"></div>

@endsection
