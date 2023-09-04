@extends('admin.layout');
@section('content')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.categories.store')}}" method="POST">
                            @csrf
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Tên Danh Mục:</label>
                                <input type="text" class="form-control"  name="category_name">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Mô Tả:</label>
                                <input type="text" class="form-control"  name="describe">
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
