@extends('admin.layouts.main')


@section('content')



    <div class="container">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Sub Category</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('subcategory.update', [$subcategory->id])}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror" value="{{$subcategory->name}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <select name="category_id" id="" class="form-control @error('description') is-invalid @enderror">
                            @foreach(\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}" @if($category->id == $subcategory->category_id) selected @endif>
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
