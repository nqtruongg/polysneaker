@extends('admin.layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">  <a href="{{route('admin.sizes.create')}}"><button class="btn btn-primary">Thêm Kích Thước </button></a></h4>
                    <table id="sizes" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Size</th>
                            <th>Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->id}}</td>
                                <td>{{$dt->size_name}}</td>
                                <td>
                                    <a href="{{route('admin.sizes.edit',['id'=>$dt->id])}}"><button class="btn btn-primary">Chỉnh Sửa</button></a>

                                    <button class="btn btn-danger" onclick="if(confirm('Are you sure?')) {document.getElementById('item-{{$dt->id}}').submit()}">
                                        Xóa
                                    </button>
                                    <form action="{{route('admin.sizes.destroy',$dt)}}" id="item-{{$dt->id}}" method="post">
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
