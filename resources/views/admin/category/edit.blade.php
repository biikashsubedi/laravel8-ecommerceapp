@extends('admin.layouts.main')


@section('content')



    <div class="container">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('category.update', [$category->id])}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea name="description" id="" cols="129" rows="5"
                                  class="form-control @error('description') is-invalid @enderror">{{$category->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img src="{{Storage::url($category->image)}}" alt="category Img" width="100">
                        <br>
                        <div class="custom-file">
                            <input type="file" name="image"
                                   class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            @error('image')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                    </div>
                     <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
