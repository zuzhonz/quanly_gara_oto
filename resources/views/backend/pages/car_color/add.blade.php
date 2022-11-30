@extends('backend.layout.master')
@section('page-title', 'Products')
@section('page-content')
    {{-- hiển thị massage đc gắn ở session::flash('error') --}}
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
    {{-- hiển thị message đc gắn ở session::flash('success') --}}
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif

    <form name="color_form" class="p-5" action=" {{ route('route_BE_Admin_color_store') }}" method="post"
        enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-4">
                <div class="mb-3">
                    <label for="" class="form-label text-secondary">Chọn màu</label>
                    <input value="" type="color" name="color" id="color" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label text-secondary">Mô tả</label>
                    <textarea name="desc" id="mytextarea" class="form-control"></textarea>
                </div>

            </div>
        </div>
        <button class="btn btn-primary">Thêm</button>
        <a href="{{ route('route_BE_Admin_car_color') }}" class="btn btn-primary">Quay Lại</a>
    </form>


@endsection
