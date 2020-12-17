@extends('admin.layouts.main')


@section('content')


    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">category</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>S.N.</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>IMAGE</th>
                                <th>DESCRIPTION</th>
                                <th>Additional Info</th>
                                <th>category</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($products)>0)
                                @foreach($products as $key=>$product)
                                    <tr>
                                        <td><a href="#">{{$key+1}}</a></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td><img src="{{Storage::url($product->image)}}" width="100"></td>
                                        <td> {!! $product->description !!}</td>
                                        <td>{!! $product->additional_info !!}</td>
                                        <td><span>{{$product->category->name}}</span></td>
                                            <td><a href="{{route('product.edit', [$product->id])}}"
                                               class="btn btn-success">Edit</a></td>
                                        <td>
                                            <form action="{{route('product.destroy', [$product->id])}}" method="post"
                                                  onsubmit="return confirmDelete()">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p><strong>Nothing To Display!!!</strong></p>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->



@endsection
