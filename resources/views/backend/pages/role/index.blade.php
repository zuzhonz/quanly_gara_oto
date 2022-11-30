@extends('backend.layout.master')
@section('page-title', 'Car Color')

{{-- route tìm kiếm --}}
@section('action_form')
    {{ route('route_BE_Admin_List_Role') }}
@endsection
{{-- end --}}
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

                    <div class="col-4 mb-3">

                        <a href="{{ route('route_BE_Admin_Add_Role') }}" class="btn btn-secondary"><i
                                class="fa-solid fa-folder-plus"></i> Thêm
                            mới</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm text-center text-primary">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($list as $key => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>
                                            {{ $item->name }}

                                        </td>
                                        <td>{{ $item->desc }}</td>

                                        <td class="col-1">
                                            <a href="{{ route('route_BE_Admin_Edit_Role', $item->id) }}"
                                                class="btn text-white btn-warning">Edit</a>
                                        </td>

                                        <td class="col-1">
                                            <a onclick=" return delete_c()"
                                                href="{{ route('route_BE_Admin_Delete_Role', $item->id) }}"
                                                class="btn btn-danger">
                                                Delete
                                            </a>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            function delete_c() {
                                if (!confirm("Bạn có chắc chắn xóa không ?"))
                                    event.preventDefault();
                            }
                        </script>

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
