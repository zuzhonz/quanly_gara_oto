@extends('backend.layout.master')
@section('page-title', 'Dịch vụ')
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
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Sửa thời gian (ca)</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""></a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('route_BE_Admin_Booking_Time') }}">Quay lại trang danh sách</a></li>
                </ol>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form class="p-5" action=" {{ route('route_BE_Admin_Update_Booking_Time') }}" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Tên ca</label>
                                    <input value="{{ old('name') ?? (request()->name ?? $res->name) }}" type="text"
                                        name="name" class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('name')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Thời gian bắt đầu</label>
                                    <input value="{{ old('start_time') ?? (request()->start_time ?? $res->start_time) }}" type="time" name="start_time"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('start_time')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Thời gian kết thúc</label>
                                    <input value="{{ old('end_time') ?? (request()->end_time ?? $res->end_time) }}" type="time" name="end_time"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('end_time')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
