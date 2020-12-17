@extends('admin.layouts.main')


@section('content')

    <div class="container">
        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <section class="gallery_wrap">
                        <div class="img-big-wrap">
                            <a href=""><img src="{{Storage::url($product->image)}}" width="400" alt=""></a>
                        </div>
                    </section>
                </aside>
                <aside class="col-sm-3">
                    <section class="card-body p-5">
                        <h3 class="title sm-3">
                            <strong>{{$product->name}}</strong>
                        </h3>
                        <p class="price-detail-wrap">
                            <span class="price h3 text-danger">
                                Rs. {{$product->price}}
                            </span>
                        </p>
                        <h2><strong>Description::</strong></h2>
                        <p>{!! $product->description !!}</p>
                        <h2><strong>Additional Info::</strong></h2>
                        <p>{!! $product->additional_info !!}</p>

                        {{--                        <hr>--}}
                        {{--                        <div class="row">--}}
                        {{--                            <div class="form-inline">--}}
                        {{--                                <h3>QUANTITY: </h3>--}}
                        {{--                                <input type="text" name="qty" class="form-control">--}}
                        {{--                                <input type="submit" name="qty" class="btn btn-success ml-2 ">--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <hr>
                        <a href="" class="btn btn-outline-primary btn-lg text-uppercase">Add to cart</a>
                    </section>
                </aside>
            </div>
        </div>
    </div>


@endsection
