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
    <form class="p-5" action=" {{ route('route_BE_Admin_Update_Tai_Khoan') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-6">

                <div class="mb-3">
                    <label for="" class="form-label">Tên tài khoản</label>
                    <input value="{{ old('name') ?? (request()->name ?? $res->name) }}" type="text" name="name"
                        class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('name')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu</label>
                    <input value="{{ old('password') ?? (request()->password ?? $res->password) }}" type="password"
                        name="password" class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('password')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Vai trò</label>
                    <select class="form-control" name="role_id" id="">
                        @foreach ($role as $item)
                            @if ($item->id == $res->role_id)
                                <option selected value=" {{ $item->id }} "> {{ $item->name }} </option>
                            @else
                                <option value=" {{ $item->id }} "> {{ $item->name }} </option>
                            @endif
                        @endforeach

                    </select>
                    @error('role_id')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input value="{{ old('email') ?? (request()->email ?? $res->email) }}" type="email" name="email"
                        class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('email')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="desc">  {{ $res->desc }} </textarea>
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
                    <input value="{{ old('address') ?? (request()->address ?? $res->address) }}" type="text"
                        name="address" class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('address')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Tuổi</label>
                    <input value="{{ old('age') ?? (request()->age ?? $res->age) }}" type="text" name="age"
                        class="form-control" id="" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('age')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Ảnh</label>
                    <img width="100px" id="anhupload" src=" {{ Storage::URL($res->avatar) }} " alt=""><br>
                    <input value="{{ old('avatar') ?? request()->avatar }}" type="file" name="avatar"
                        class="form-control" id="avatar" aria-describedby="emailHelp">
                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                    @error('avatar')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Giới tính</label>
                    <select class="form-control" name="gender" id="">
                        <option value="1" {{ $res->gender == 1 ? 'selected' : false }}>Nam</option>
                        <option value="0" {{ $res->gender == 0 ? 'selected' : false }}>Nữ</option>
                    </select>
                    @error('gender')
                        <span style="color: red"> {{ $message }} </span>
                    @enderror
                </div>

            </div>


        </div>
        <button type="submit" class="btn btn-primary">Cập nhập</button>

    </form>
@endsection
