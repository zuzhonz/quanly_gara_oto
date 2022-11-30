@extends('backend.layout.master')

@section('action_form')
    {{ route('route_BE_Admin_Tai_Khoan') }}
@endsection
@section('page-title', 'Products')
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
                <div class="card-header">

                    <button class="btn btn-primary"><a style="color: red"
                            href=" {{ route('route_BE_Admin_Add_Tai_Khoan') }} ">Thêm</a></button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="role">
                                        Vai trò <i class="fa-solid fa-down"></i>
                                        <ul class="menu-role">

                                            <li><a href="?keyword=1">Admin</a></li>
                                            <li><a href="?keyword=2">Nhân viên</a></li>
                                        </ul>
                                    </th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Xóa</th>
                                    <th scope="col">Chỉnh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $item)
                                    <tr>

                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $item->name }} </td>
                                        <td>{{ $item->email }} </td>
                                        <td>
                                            @foreach ($role as $r)
                                                @if ($r->id == $item->role_id)
                                                    {{ $r->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <img width="100ox" src=" {{ Storage::URL($item->avatar) }} " alt="">
                                        </td>
                                        <td><button class="btn btn-warning"><a
                                                    href="{{ route('route_BE_Admin_Edit_Tai_Khoan', ['id' => $item->id]) }}">Edit</a></button>
                                        </td>
                                        <td><button class="btn btn-danger"><a
                                                    href=" {{ route('route_BE_Admin_Delete_Tai_Khoan', ['id' => $item->id]) }}">Delete</a></button>
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
