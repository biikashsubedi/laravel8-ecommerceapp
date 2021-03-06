@extends('admin.layouts.main')


@section('content')



    <div class="container">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Products</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('product.update', [$product->id])}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" value="{{$product->name}}"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" name="price" value="{{$product->price}}"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('price')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image"
                                   class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <img src="{{Storage::url($product->image)}}" alt="No Image" width="100">
                            <br>
                            @error('image')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Choose Category</label>
                        <select name="category" class="form-control @error('category') is-invalid @enderror" id="">
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Choose Sub-Category</label>
                        <select name="subcategory" class="form-control @error('category') is-invalid @enderror" id="">
                            <option value="">Select</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea name="description" id=""
                                  class="form-control @error('description') is-invalid @enderror">{{$product->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Additional Info</label>
                        <textarea name="additional_info" id=""
                                  class="form-control @error('additional_info') is-invalid @enderror">{{$product->additional_info}}</textarea>
                        @error('additional_info')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $("document").ready(function () {
            $('select[name="category"]').on('change', function () {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: '/loadsubcategories/' + catId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subcategory"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory"]').append('<option value=" ' + key + ' ">' + value + '</option>')
                            })
                        }
                    })
                }
            })
        })
    </script>

@endsection
