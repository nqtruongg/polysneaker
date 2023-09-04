@extends('admin.layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="users" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ và Tên</th>
                            <th>Email</th>
                            <th>Vai Trò</th>
                            <th>Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->id}}</td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->email}}</td>
                                <td>{{$dt->role->name}}</td>



{{--                                <td>{{$dt->category_id}}</td>--}}
{{--                                <td>{{$dt->size_id}}</td>--}}
{{--                                <td>{{$dt->color_id}}</td>--}}
                                <td>
                                    <a href="{{route('admin.users.edit',['id'=>$dt->id])}}"><button class="btn btn-primary">Chỉnh Sửa</button></a>

                                    <button class="btn btn-danger" onclick="if(confirm('Are you sure?')) {document.getElementById('item-{{$dt->id}}').submit()}">
                                        Xóa
                                    </button>
                                    <form action="{{route('admin.users.destroy',$dt)}}" id="item-{{$dt->id}}" method="post">
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
