@extends('admin.layout');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.users.update', ['id' => $model->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Họ và Tên:</label>
                            <input type="text" value="{{$model->name}}" class="form-control" name="name" disabled>
                        </div>
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Email:</label>
                            <input type="text" value="{{$model->email}}" class="form-control" name="email" disabled>
                        </div>
                        <div class="mb-3 mt-3">
                            <label  class="form-label">Vai Trò:</label>
                             <select name="role_id" class="form-control">
                                 @foreach($role as $data)
                                     <option value="{{$data->id}}"@selected($data->id == $model->role_id)>
                                       {{$data->name}}
                                     </option>
                                 @endforeach
                             </select>
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

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
    <!--  /Traffic -->
    <div class="clearfix"></div>






@endsection

