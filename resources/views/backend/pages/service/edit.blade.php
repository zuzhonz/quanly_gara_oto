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
                    <h4>Sửa dịch vụ</h4>
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
                    <form class="p-5" action=" {{ route('route_BE_Admin_Update_Services') }}" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Tên dịch vụ</label>
                                    <input value="{{ old('name') ?? (request()->name ?? $res->name) }}" type="text"
                                        name="name" class="form-control" id="" aria-describedby="emailHelp">
                                    {{-- hiển thị lỗi validate -  funciton message trong file DanhMucRequest --}}
                                    @error('name')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Quy định</label>
                                    <textarea class="form-control" id="mytextarea" name="regulations">{{ $res->regulations }}</textarea>
                                    {{-- <div class="card">
                                       
                                        <div class="card-body">
                                            <div class="summernote" name="desc" >
                
                                            </div>
                                        </div>
                                    </div> --}}
                                    @error('regulations')
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
