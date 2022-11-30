@extends('backend.layout.master')
@section('page-title', 'Dịch vụ')
@section('page-content')
    {{-- hiển thị massage đc gắn ở session::flash('error') --}}
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif


    {{-- hiển thị message đc gắn ở session::flash('success') --}}

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card"> 
                <div class="card-body">
                    <form action="" class="my-4">
                        <div class="row">
                            <div class="col-3">
                                <input class="form-control" name="name" value="{{ $params['name'] ?? '' }}"
                                    placeholder="Tìm kiếm"> 
                            </div>
                            <div class="col-2">
                                <select class="form-control" name="order_by">
                                    <option value="desc"
                                        {{ isset($params['order_by']) && $params['order_by'] == 'desc' ? 'selected' : '' }}>
                                        Sắp xếp mới nhất
                                    </option>
                                    <option value="asc"
                                        {{ isset($params['order_by']) && $params['order_by'] == 'asc' ? 'selected' : '' }}>
                                        Sắp
                                        xếp cũ nhất
                                    </option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select class="form-control" name="limit">
                                    <option value="" {{ !isset($params['limit']) ? 'selected' : '' }}>Số lượng bản ghi
                                        hiển thị
                                    </option>
                                    <option value="10"
                                        {{ isset($params['limit']) && $params['limit'] == '10' ? 'selected' : '' }}>
                                        10
                                    </option>

                                    <option value="25"
                                        {{ isset($params['limit']) && $params['limit'] == '25' ? 'selected' : '' }}>
                                        25
                                    </option>
                                    <option value="50"
                                        {{ isset($params['limit']) && $params['limit'] == '50' ? 'selected' : '' }}>
                                        50
                                    </option>
                                    <option value="100"
                                        {{ isset($params['limit']) && $params['limit'] == '100' ? 'selected' : '' }}>
                                        100
                                    </option>
                                </select>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary">Tìm kiếm</button>
                                <a class="btn btn-danger" href="">Bỏ chọn</a>
                                <a href="{{ route('route_BE_Admin_Add_Services') }}" class="btn btn-secondary"><i
                                        class="fa-solid fa-folder-plus"></i> Thêm
                                    mới</a>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm text-center text-primary">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên dịch vụ</th>
                                    <th scope="col">Quy định</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($list as $key => $item)
                                    <tr>
                                        <td>{{ $key++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ substr($item->regulations, 0, -20) }}...</td>
                                        <td class="col-1">
                                            <a href="{{ route('route_BE_Admin_Edit_Services', ['id' => $item->id]) }}" class="btn btn-warning">Edit</a>
                                        </td>
                                        <td class="col-1">
                                            <a href="{{ route('route_BE_Admin_Delete_Services', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        <div class="">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                {{ $list->appends('params')->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
