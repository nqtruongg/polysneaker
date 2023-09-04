@extends('admin.layout');
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.roles.store')}}" method="POST">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Vai Trò:</label>
                                <input type="text" class="form-control"  name="name">
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Trạng Thái:</label>
                                <input type="text" class="form-control"  name="status">
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
