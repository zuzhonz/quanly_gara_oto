@extends('backend.layout.master')
@section('page-title', 'Profile')

@section('page-content')
    <div class="">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-0">{{ $user->name }}</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                    </ol>
                </div>
            </div>


            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo"></div>
                                <div class="profile-photo">
                                    @if ($user->avatar)
                                        <img src="{{ Storage::Url($user->avatar) }}" class="img-fluid rounded-circle"
                                            alt="">
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div class="profile-info">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8">
                                        <div class="row">
                                            <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                <div class="profile-name">
                                                    <h4 class="text-primary">{{ $user->name }}</h4>
                                                    <p>{{ $role }}</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                <div class="profile-email">
                                                    <h4 class="text-muted">{{ $user->email }}</h4>
                                                    <p>Email</p>
                                                </div>
                                            </div>
                                            <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="profile-call">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h4 class="text-muted">(+1) 321-837-1030</h4>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <p>Phone No.</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-statistics">
                                <div class="text-center mt-4 border-bottom-1 pb-3">
                                    <div class="row">
                                        {{-- <div class="col">
                                            <h3 class="m-b-0">150</h3><span>Follower</span>
                                        </div> --}}
                                        {{-- <div class="col">
                                            <h3 class="m-b-0">140</h3><span>Place Stay</span>
                                        </div> --}}
                                        <div class="col">
                                            <h3 class="m-b-0">{{ $count_bolg }}</h3><span>B??i vi???t</span>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('route_BE_Admin_blog_create') }}"
                                            class="btn btn-primary pl-5 pr-5 mr-3 mb-4">Th??m b??i vi???t</a>
                                        {{-- <a href="javascript:void()" class="btn btn-dark pl-5 pr-5 mb-4">Send
                                            Message</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="profile-blog pt-3 border-bottom-1 pb-1">
                                {{-- <h5 class="text-primary d-inline">Today Highlights</h5><a href="javascript:void()"
                                    class="pull-right f-s-16">More</a> --}}

                                <h4>M?? t??? b???n th??n</h4>


                                {!! $user->desc !!}

                            </div>
                            {{-- <div class="profile-interest mt-4 pb-2 border-bottom-1">
                                <h5 class="text-primary d-inline">Interest</h5>
                                <div class="row mt-4">
                                    <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                        <a href="javascript:void()" class="interest-cat">
                                            <img src="images/profile/2.jpg" alt="" class="img-fluid">
                                            <p>Shopping Mall</p>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                        <a href="javascript:void()" class="interest-cat">
                                            <img src="images/profile/3.jpg" alt="" class="img-fluid">
                                            <p>Photography</p>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                        <a href="javascript:void()" class="interest-cat">
                                            <img src="images/profile/4.jpg" alt="" class="img-fluid">
                                            <p>Art &amp; Gallery</p>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                        <a href="javascript:void()" class="interest-cat">
                                            <img src="images/profile/2.jpg" alt="" class="img-fluid">
                                            <p>Visiting Place</p>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                        <a href="javascript:void()" class="interest-cat">
                                            <img src="images/profile/3.jpg" alt="" class="img-fluid">
                                            <p>Shopping</p>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                        <a href="javascript:void()" class="interest-cat">
                                            <img src="images/profile/4.jpg" alt="" class="img-fluid">
                                            <p>Biking</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-news mt-4 pb-3">
                                <h5 class="text-primary d-inline">Our Latest News</h5>
                                <div class="media pt-3 pb-3">
                                    <img src="images/profile/5.jpg" alt="image" class="mr-3">
                                    <div class="media-body">
                                        <h5 class="m-b-5">John Tomas</h5>
                                        <p>I shared this on my fb wall a few months back, and I thought I'd share it here
                                            again because it's such a great read</p>
                                    </div>
                                </div>
                                <div class="media pt-3 pb-3">
                                    <img src="images/profile/6.jpg" alt="image" class="mr-3">
                                    <div class="media-body">
                                        <h5 class="m-b-5">John Tomas</h5>
                                        <p>I shared this on my fb wall a few months back, and I thought I'd share it here
                                            again because it's such a great read</p>
                                    </div>
                                </div>
                                <div class="media pt-3 pb-3">
                                    <img src="images/profile/7.jpg" alt="image" class="mr-3">
                                    <div class="media-body">
                                        <h5 class="m-b-5">John Tomas</h5>
                                        <p>I shared this on my fb wall a few months back, and I thought I'd share it here
                                            again because it's such a great read</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        {{-- <li class="nav-item"><a href="#my-posts" data-toggle="tab"
                                                class="nav-link active show">Posts</a>
                                        </li> --}}
                                        <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">Gi???i
                                                thi???u</a>
                                        </li>
                                        <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                                class="nav-link">C??i ?????t</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        {{-- <div id="my-posts" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">
                                                <div class="post-input">
                                                    <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent"
                                                        placeholder="Please type what you want...."></textarea> <a href="javascript:void()"><i
                                                            class="ti-clip"></i> </a>
                                                    <a href="javascript:void()"><i class="ti-camera"></i> </a><a
                                                        href="javascript:void()" class="btn btn-primary">Post</a>
                                                </div>
                                                <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                    <img src="images/profile/8.jpg" alt="" class="img-fluid">
                                                    <a class="post-title" href="javascript:void()">
                                                        <h4>Collection of textile samples lay spread</h4>
                                                    </a>
                                                    <p>A wonderful serenity has take possession of my entire soul like these
                                                        sweet morning of spare which enjoy whole heart.A wonderful serenity
                                                        has take possession of my entire soul like these sweet morning
                                                        of spare which enjoy whole heart.</p>
                                                    <button class="btn btn-primary mr-3"><span class="mr-3"><i
                                                                class="fa fa-heart"></i></span>Like</button>
                                                    <button class="btn btn-secondary"><span class="mr-3"><i
                                                                class="fa fa-reply"></i></span>Reply</button>
                                                </div>
                                                <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                    <img src="images/profile/9.jpg" alt="" class="img-fluid">
                                                    <a class="post-title" href="javascript:void()">
                                                        <h4>Collection of textile samples lay spread</h4>
                                                    </a>
                                                    <p>A wonderful serenity has take possession of my entire soul like these
                                                        sweet morning of spare which enjoy whole heart.A wonderful serenity
                                                        has take possession of my entire soul like these sweet morning
                                                        of spare which enjoy whole heart.</p>
                                                    <button class="btn btn-primary mr-3"><span class="mr-3"><i
                                                                class="fa fa-heart"></i></span>Like</button>
                                                    <button class="btn btn-secondary"><span class="mr-3"><i
                                                                class="fa fa-reply"></i></span>Reply</button>
                                                </div>
                                                <div class="profile-uoloaded-post pb-5">
                                                    <img src="images/profile/8.jpg" alt="" class="img-fluid">
                                                    <a class="post-title" href="javascript:void()">
                                                        <h4>Collection of textile samples lay spread</h4>
                                                    </a>
                                                    <p>A wonderful serenity has take possession of my entire soul like these
                                                        sweet morning of spare which enjoy whole heart.A wonderful serenity
                                                        has take possession of my entire soul like these sweet morning
                                                        of spare which enjoy whole heart.</p>
                                                    <button class="btn btn-primary mr-3"><span class="mr-3"><i
                                                                class="fa fa-heart"></i></span>Like</button>
                                                    <button class="btn btn-secondary"><span class="mr-3"><i
                                                                class="fa fa-reply"></i></span>Reply</button>
                                                </div>
                                                <div class="text-center mb-2"><a href="javascript:void()"
                                                        class="btn btn-primary">Load More</a>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div id="about-me" class="tab-pane fade active show">


                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mt-4">Th??ng tin c?? nh??n</h4>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">T??n <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $user->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $user->email }}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Tu???i t??c <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $user->age }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Gi???i t??nh <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $gender }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">?????a ??i???m <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-9"><span>{{ $user->address }}</span>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-3">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="profile-settings" class="tab-pane fade">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary">Thi???t l???p t??i kho???n</h4>
                                                    <form action="{{ route('Profile') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>T??n</label>
                                                                <input type="text" name="name" placeholder=""
                                                                    class="form-control" value="{{ $user->name }}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Tu???i</label>
                                                                <input type="number" name="age" placeholder=""
                                                                    value="{{ $user->age }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>?????a ch???</label>
                                                            <input type="text" name="address"
                                                                value="{{ $user->address }}"placeholder="1234 Main St"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Gi???i t??nh</label>
                                                            <select class="form-control" name="gender">
                                                                <option selected>--Ch???n gi???i t??nh--</option>
                                                                <option value="1"
                                                                    {{ $user->gender == 1 ? 'selected' : '' }}>
                                                                    Nam
                                                                </option>
                                                                <option value="2"
                                                                    {{ $user->gender == 2 ? 'selected' : '' }}>
                                                                    N???
                                                                </option>
                                                                <option value="3"
                                                                    {{ $user->gender == 3 ? 'selected' : '' }}>
                                                                    Kh??c
                                                                </option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Avatar</label>
                                                            <input type="file" name="avatar" class="form-control">
                                                        </div>



                                                        <button class="btn btn-primary" type="submit">L??u</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('success'))
        <script>
            Swal.fire(
                'Th??nh c??ng!',
                'C???p nh???t t??i kho???n th??nh c??ng!',
                'success'
            )
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire(
                'Th???t b???i!',
                'C???p nh???t th???t b???i!',
                'error'
            )
        </script>
    @endif


@endsection
