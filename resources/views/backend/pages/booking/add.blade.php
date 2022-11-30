@extends('backend.layout.master')
@section('page-title', 'Đặt lịch')
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
                    <h4>Thêm mới đặt lịch</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""></a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('route_BE_Admin_Booking') }}">Quay lại trang danh
                            sách</a></li>
                </ol>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form class="p-5" action=" {{ route('route_BE_Admin_Add_Booking') }}" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Họ và tên</label>
                                    <input value="{{ old('name') ?? request()->name }}" type="text" name="name"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('name')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input value="{{ old('email') ?? request()->email }}" type="text" name="email"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('email')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Số điện thoại</label>
                                    <input value="{{ old('phone') ?? request()->phone }}" type="text" name="phone"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('phone')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Ngày sinh</label>
                                    <input value="{{ old('birthday') ?? request()->birthday }}" type="date"
                                        name="birthday" class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('birthday')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Địa chỉ</label>
                                    <textarea class="form-control" name="address"></textarea>
                                    {{-- <div class="card">
                                       
                                        <div class="card-body">
                                            <div class="summernote" name="desc" >
                
                                            </div>
                                        </div>
                                    </div> --}}
                                    @error('address')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Thời gian (ca)</label>
                                    <select class="form-control" name="booking_time_id" id="">
                                        <option value="">Chọn thời gian</option>
                                        @foreach ($booking_time as $item)
                                            <option value=" {{ $item->id }} "> {{ $item->name }} </option>
                                        @endforeach

                                    </select>
                                    @error('booking_time_id')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Dịch vụ</label>
                                    <select class="form-control" name="services_id" id="">
                                        <option value="">Chọn dịch vụ</option>
                                        @foreach ($services as $item)
                                            <option value=" {{ $item->id }} "> {{ $item->name }} </option>
                                        @endforeach

                                    </select>
                                    @error('services_id')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Xe</label>
                                    <select class="form-control" name="car_id" id="">
                                        <option value="">Chọn xe ...</option>
                                        @foreach ($cars as $item)
                                            <option value=" {{ $item->id }} "> {{ $item->name }} </option>
                                        @endforeach

                                    </select>
                                    @error('car_id')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Lời nhắn nhủ</label>
                                    <textarea class="form-control" name="desc"></textarea>
                                    {{-- <div class="card">
                                       
                                        <div class="card-body">
                                            <div class="summernote" name="desc" >
                
                                            </div>
                                        </div>
                                    </div> --}}
                                    @error('desc')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
