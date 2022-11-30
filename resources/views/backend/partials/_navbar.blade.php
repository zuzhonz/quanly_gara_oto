<!--**********************************
            Sidebar start
        ***********************************-->
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-single-04"></i><span
                        class="nav-text">Tài khoản</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_Tai_Khoan') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_Add_Tai_Khoan') }}">Thêm mới</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Hãng xe</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_Car_Branch') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_Add_Car_Branch') }}">Thêm mới</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Xe oto</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_Cars') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_Add_Cars') }}">Thêm mới</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Màu xe</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_car_color') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_color_create') }}">Thêm mới</a></li>
                </ul>
            </li>

            {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Album ảnh xe</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_Car_Album') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_Add_Car_Album') }}">Thêm mới</a></li>
                </ul>
            </li> --}}

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Bài Viết</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_car_blog') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_blog_create') }}">Thêm mới</a></li>
                </ul>
            </li>


            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Dịch vụ</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_Services') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_Add_Services') }}">Thêm mới</a></li>
                </ul>
            </li>




            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Nhân viên hướng dẫn</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_Employees') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_Add_Employees') }}">Thêm mới</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Thời gian</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_Booking_Time') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_Add_Booking_Time') }}">Thêm mới</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Đặt lịch</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_Booking') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_Add_Booking') }}">Thêm mới</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Lịch</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('Calendar') }}">Bảng lịch</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Banner</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('route_BE_Admin_Banner') }}">Danh sách</a></li>
                    <li><a href="{{ route('route_BE_Admin_Add_Banner') }}">Thêm mới</a></li>
                </ul>
            </li>



        </ul>
    </div>


</div>
<!--**********************************
            Sidebar end
        ***********************************-->
