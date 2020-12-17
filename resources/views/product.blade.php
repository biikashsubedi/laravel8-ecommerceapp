@extends('layouts.app')


@section('content')

    <div class="container">
        <main>
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Album example</h1>
                        <p class="lead text-muted">Something short and leading about the...</p>
                        <p>
                            <a href="#" class="btn btn-primary my-2">Main call to action</a>
                            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                        </p>
                    </div>
                </div>
            </section>
            <h2>Categories</h2>
            @foreach(\App\Models\Category::all() as $category)
                <button class="btn btn-outline-info">{{$category->name}}</button>
            @endforeach

            <div class="album py-5 bg-light">
                <div class="container">
                    <h2>Products</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                        @if(count($products)>0)
                            @foreach($products as $product)
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <img src="{{Storage::url($product->image)}}" class="img-fluid rounded" width=""
                                             alt="">

                                        <div class="card-body">
                                            <p><strong>{{$product->name}}</strong></p>
                                            <p class="card-text">{{Str::limit($product->description, 120)}}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{route('product.show',[$product->id]) }}"><button type="button" class="btn btn-sm btn-outline-success">
                                                        View
                                                    </button></a>
                                                    <button type="button" class="btn btn-sm btn-outline-primary">
                                                        Add to Cart
                                                    </button>
                                                </div>
                                                <small
                                                    class="text-muted">{{$product->created_at->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Nothing To DISPLAY</p>
                        @endif
                    </div>

                </div>
            </div>

        </main>

        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('photo.jpg')}}" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="{{asset('photo.jpg')}}" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item active">
                        <img src="{{asset('photo.jpg')}}" class="d-block w-100 img-fluid" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


        <footer class="text-muted py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for
                    yourself!</p>
                <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                        href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
            </div>
        </footer>
    </div>



@endsection
