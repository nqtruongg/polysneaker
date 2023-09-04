@extends('admin.layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">  <a href="{{route('admin.roles.create')}}"><button class="btn btn-primary">Thêm vai trò </button></a></h4>
                    <table id="roles" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Vai Trò</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->id}}</td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->status}}</td>
                                <td>

                                    <button class="btn btn-danger" onclick="if(confirm('Are you sure?')) {document.getElementById('item-{{$dt->id}}').submit()}">
                                        Xóa
                                    </button>
                                    <form action="{{route('admin.roles.destroy',$dt)}}" id="item-{{$dt->id}}" method="post">
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
