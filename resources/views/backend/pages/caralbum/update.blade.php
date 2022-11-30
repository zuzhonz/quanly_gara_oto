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
                    <h4>Update album car</h4>
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
                    <form class="p-5" action="{{route('route_BE_Admin_Update_Car_Album')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Ô tô</label>
                                    <select name="car_id" class='form-control'>
                                        @foreach ($cars as $item) 
                                            <option value="{{$item->id}}"
                                                {{(isset($detail) && $detail->car_id === $item->id) ? 'selected' : ''}}
                                            >{{$item->name }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="" aria-describedby="emailHelp" multiple="multiple">
                                    <div class="row"> 
                                            <div class="col-md-3">
                                                <a href="#" class="thumbnail">
                                                    <img src="/storage/{{$detail->image}}" style="max-height: 200px">
                                                </a>
                                            </div> 
                                    </div>
                                    
                                    @error('image')
                                        <span style="color: red"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
