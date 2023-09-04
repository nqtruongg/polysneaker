@extends('admin.layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="orders" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ nhận hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Tổng Tiền</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->id}}</td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->address}}</td>
                                <td>{{$dt->phone}}</td>
                                <td>{{number_format($dt->total)}} vnd</td>
                                <td>
                                    @if( $dt->status == 1)
                                        <span class="badge badge-warning">Chờ xác nhận</span>
                                    @elseif($dt->status == 2)
                                        <span class="badge badge-info">Đang giao hàng</span>
                                    @elseif($dt->status == 3)
                                        <span class="badge badge-success">Giao thành công</span>
                                    @elseif($dt->status == 4)
                                        <span class="badge badge-danger">Hủy đơn hàng</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('admin.orders.edit',['id'=>$dt->id])}}"><button class="btn btn-primary">Chỉnh Sửa</button></a>
                                    @if($dt->status == 3)
                                        @if(auth()->user()->role_id == '2')
                                            <a href="{{route('admin.orders.print', $dt->id)}}" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> In hóa đơn</a>
                                    @endif
                                    @endif
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
