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
    <form class="p-5" action=" {{ route('route_BE_Admin_Add_Tai_Khoan') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-6">

                <div class="mb-3">
                    <label for="" class="form-label">Tên tài khoản</label>
                    <input value="{{ old('name') ?? request()->name }}" type="text" name="name" class="form-control"
                        id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('name')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu</label>
                    <input value="{{ old('password') ?? request()->password }}" type="text" name="password" class="form-control"
                        id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('password')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Vai trò</label>
                    <select class="form-control" name="role_id" id="">
                        @foreach ($role as $item)
                            <option value=" {{ $item->id }} "> {{ $item->name }} </option>
                        @endforeach

                    </select>
                    @error('avatar')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input value="{{ old('email') ?? request()->email }}" type="email" name="email"
                        class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('email')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Mô tả</label>
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

            <div class="col-6">
                <div class="mb-3">
                    <label for="" class="form-label">Địa chỉ</label>
                    <input value="{{ old('address') ?? request()->address }}" type="text" name="address"
                        class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('address')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Tuổi</label>
                    <input value="{{ old('age') ?? request()->age }}" type="text" name="age" class="form-control"
                        id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('age')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Ảnh</label>
                    <input value="{{ old('avatar') ?? request()->avatar }}" type="file" name="avatar"
                        class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('avatar')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Giới tính</label>
                    <select class="form-control" name="gender" id="">
                        <option value="">Giới tính</option>
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                    @error('avatar')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

            </div>


        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>

    </form>
@endsection
