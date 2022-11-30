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
                    <h4>Sửa oto</h4>
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
                    <form class="p-5" action=" {{ route('route_BE_Admin_Update_Cars') }}" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Tên Xe</label>
                                    <input value="{{ old('name') ?? (request()->name ?? $res->name) }}" type="text"
                                        name="name" class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('name')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Loại xe</label>
                                    <select class="form-control" name="car_branch_id" id="">
                                        <option value="">Chọn loại xe...</option>
                                        @foreach ($car_branch as $item)
                                            @if ($item->id == $res->car_branch_id)
                                                <option selected value=" {{ $item->id }} "> {{ $item->name }}
                                                </option>
                                            @else
                                                <option value=" {{ $item->id }} "> {{ $item->name }} </option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('car_branch_id')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Giá</label>
                                    <input value="{{ old('price') ?? (request()->price ?? $res->price) }}" type="text"
                                        name="price" class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('price')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Style</label>
                                    <input value="{{ old('style') ?? (request()->style ?? $res->style) }}" type="text"
                                        name="style" class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('style')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="" class="form-label">Mô tả</label>
                                    <textarea class="form-control" id="mytextarea" name="desc"> {{ $res->desc }} </textarea>
                                    @error('desc')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">ảnh chính</label>
                                    <input id="avatar" type="file" class="form-control" name="car_image">
                                </div>
                                <div class="col-6">
                                    <img id="anhupload" src="{{ Storage::URL($res->car_image) }}" width="100px" alt="">
                                </div>


                            </div>

                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Màu theo xe</label>
                                    <select class="form-control" name="car_color_id" id="">
                                        <option value="">Chọn màu xe...</option>
                                        @foreach ($car_color as $item)
                                            @if ($item->id == $res->car_color_id)
                                                <option selected class="text-white" style="background-color:{{ $item->color }}" value=" {{ $item->id }} "> {{ $item->color }}
                                                </option>
                                            @else
                                                <option class="text-white" style="background-color:{{ $item->color }}" value=" {{ $item->id }} "> {{ $item->color }} </option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('car_color_id')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Kích thước D x R x C</label>
                                    <input value="{{ old('size') ?? (request()->size ?? $res->size) }}" type="text"
                                        name="size" class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('size')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Nguồn gốc xuất sứ</label>
                                    <input value="{{ old('origin') ?? (request()->origin ?? $res->origin) }}"
                                        type="text" name="origin" class="form-control" id=""
                                        aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('origin')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Động cơ</label>
                                    <input value="{{ old('engine') ?? (request()->engine ?? $res->engine) }}"
                                        type="text" name="engine" class="form-control" id=""
                                        aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('engine')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Công xuất</label>
                                    <input value="{{ old('wattage') ?? (request()->wattage ?? $res->wattage) }}"
                                        type="text" name="wattage" class="form-control" id=""
                                        aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('wattage')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Số KM đã đi</label>
                                    <input value="{{ old('mileage') ?? (request()->mileage ?? $res->mileage) }}"
                                        type="text" name="mileage" class="form-control" id=""
                                        aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('mileage')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="" class="form-label">List ảnh</label><br>
                                    @foreach ($album as $key=>$item)
                                        <div style="margin-bottom: 20px">
                                            <input name="{{'car_list_image' . $key}}" id="avatar2" width="50px" type="file" value=" {{$item}} ">
                                            <img id="anhupload2" style="width:115px; height:120px " src="{{ Storage::URL($item) }}"
                                                alt="product-image" />
                                        </div><br>
                                    @endforeach
                                </div>



                            </div>






                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Thêm</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

