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
    <form class="p-5" action=" {{ route('route_BE_Admin_Add_Car_Branch') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-6">

                <div class="mb-3">
                    <label for="" class="form-label">Tên hãng</label>
                    <input value="{{ old('name') ?? request()->name }}" type="text" name="name"
                        class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('name')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="desc" ></textarea>
                    @error('name')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>


            </div>



        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>

    </form>
@endsection
