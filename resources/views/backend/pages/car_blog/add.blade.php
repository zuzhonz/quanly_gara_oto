@extends('backend.layout.master')
@section('page-title', 'Products')

@section('page-content')


    <form name="blog_form" class="p-5" action=" {{ route('route_BE_Admin_blog_store') }}" method="post"
        enctype="multipart/form-data">
        <div class="row mb-3">
            @csrf
            <div class="col-4">
                <div class="mb-3">
                    <label for="" class="form-label text-secondary">Tiêu Đề</label>
                    <input value="{{ old('title') }}" type="text" name="title" id="title" class="form-control">
                    @error('title')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label text-secondary">Mô tả</label>
                    <input value="{{ old('content') }}" type="text" name="content" class="form-control" id="mytextarea">
                    @error('content')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label text-secondary">Ảnh</label>
                    <input type="file" class="form-control" id="image" name="image" id="">
                    @error('image')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

            </div>
        </div>
        <button class="btn btn-primary">Thêm</button>
        <a href="{{ route('route_BE_Admin_car_blog') }}" class="btn btn-primary">Quay Lại</a>
    </form>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>




@endsection
