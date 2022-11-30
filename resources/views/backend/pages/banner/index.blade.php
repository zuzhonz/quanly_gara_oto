@extends('backend.layout.master')
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

                    <a href="{{ route('route_BE_Admin_Add_Banner') }}" class="btn btn-secondary"><i
                         class="fa-solid fa-folder-plus"></i> Thêm
                     mới</a>
                    {{-- <button class="btn btn-primary"><a style="color: red"
                            href=" {{ route('route_BE_Admin_Add_Banner') }} ">Thêm</a></button> --}}

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm text-center text-primary">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $item)
                                    <tr>

                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $item->title }} </td>
                                        <td> <img width="60px" height="60px" src="{{ Storage::url($item->image) }}"
                                                alt=""> </td>
                                        <td><button class="btn btn-warning"><a style="
                                             color:#fff"
                                                    href="{{ route('route_BE_Admin_Edit_Banner', ['id' => $item->id]) }}">Edit</a></button>
                                        </td>
                                        <td><button class="btn btn-danger"><a style="
                                        color:#fff" onclick=" return delete_c()"
                                                    href=" {{ route('route_BE_Admin_Delete_Banner', ['id' => $item->id]) }}">Delete</a></button>
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
