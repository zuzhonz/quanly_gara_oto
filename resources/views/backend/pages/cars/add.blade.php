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
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Thêm mới oto</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""></a></li>
                    <li class="breadcrumb-item active"><a href="">Quay lại trang danh sách</a></li>
                </ol>
            </div>

            <div class="card-body">
                <div class="basic-form">
                    <form class="p-5" action=" {{ route('route_BE_Admin_Add_Cars') }}" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Tên Xe</label>
                                    <input value="{{ old('name') ?? request()->name }}" type="text" name="name"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('name')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Loại xe</label>
                                    <select class="form-control" name="car_branch_id">
                                        <option value="">Chọn hãng xe...</option>
                                        @foreach ($car_branch as $item)
                                            <option value=" {{ $item->id }} "> {{ $item->name }} </option>
                                        @endforeach

                                    </select>
                                    @error('car_branch_id')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Giá</label>
                                    <input value="{{ old('price') ?? request()->price }}" type="text" name="price"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('price')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Kiểu cách</label>
                                    <input value="{{ old('style') ?? request()->style }}" type="text" name="style"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('style')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="" class="form-label">Mô tả</label>
                                    <textarea name="desc" id="mytextarea" class="form-control"></textarea>
                                    @error('desc')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>
                              
                                    <div class="mb-3">
                                        <label for="" class="form-label">ảnh chính</label>
                                        <input type="file" class="form-control" name="car_image">
                                    </div>
                                    @error('car_image')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                               

                            </div>

                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Màu theo xe</label>
                                    <select class="form-control" name="car_color_id" id="">
                                        <option value="">Chọn màu xe...</option>
                                        @foreach ($car_color as $item)
                                            <option class="text-white" style="background-color:{{ $item->color }}" value=" {{ $item->id }} "> {{ $item->color }} </option>
                                        @endforeach

                                    </select>
                                    @error('car_color_id')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Kích thước D x R x C</label>
                                    <input value="{{ old('size') ?? request()->size }}" type="text" name="size"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('size')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Nguồn gốc xuất sứ</label>
                                    <input value="{{ old('origin') ?? request()->origin }}" type="text" name="origin"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('origin')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Động cơ</label>
                                    <input value="{{ old('engine') ?? request()->engine }}" type="text" name="engine"
                                        class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('engine')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Công xuất</label>
                                    <input value="{{ old('wattage') ?? request()->wattage }}" type="text"
                                        name="wattage" class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('wattage')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Số KM đã đi</label>
                                    <input value="{{ old('mileage') ?? request()->mileage }}" type="text"
                                        name="mileage" class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('mileage')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                            
                                    <div class="mb-3">
                                        <label for="" class="form-label">List ảnh</label>
                                        <input multiple type="file" class="form-control" name="car_list_image[]">
                                    </div>
                                    @error('car_list_image')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                              

                            </div>

                            


                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
