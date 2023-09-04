@extends('client.layout')
@section('content')



    <!-- Product -->
    <div class="bg0 m-t-23 p-b-140">

        <div class="container">

            <div class="flex-w flex-sb-m p-b-52"></div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="{{ route('products.filter') }}" class="form-inline" style="margin-left: 300px" method="GET">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="category_id" value="">Tất cả</button>
                                @foreach($categories as $category)
                                    <button type="submit" class="btn btn-primary" name="category_id" value="{{ $category->id }}">{{ $category->category_name }}</button>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row isotope-grid">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <a href="{{ route('products.detail', $product->id) }}">
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ asset($product->image) }}" alt="IMG-PRODUCT">
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l">
                                        <div class="text-black" style="color: black; font-weight: bold">{{ $product->product_name }}</div>
                                    </div>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <div class="stext-105 cl3" style="color: red; font-weight: bold">{{ number_format($product->price) }} vnd</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div style="margin-left: 600px">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection
