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
    <form class="p-5" action=" {{ route('route_BE_Admin_Add_Banner') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-6">

                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input value="{{ old('name') ?? request()->name }}" type="text" name="title"
                        class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('title')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="mb-3">
                     <img width="150px" height="150px" id="anh" src="" alt="."><br>
                    <label for="" class="form-label">Ảnh</label>
                    <input id="hinhanh" class="form-conntrol" type="file" name="image" id="">
                    @error('image')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>


            </div>



        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>

    </form>
@endsection
