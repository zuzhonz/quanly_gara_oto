<header>
    <div class="container">
        <div class="row">
            <div id="header">
                <div class="header-container">
                    <div class="header-logo"> <a href="{{ route('route_FE_Client_Home') }}" title="Car HTML" class="logo">
                            <div><img src="{{ asset('/images/logo.png') }}" alt="Car Store"></div>
                        </a> </div>
                    <div class="header__nav">
                        <div class="header-banner">
                            <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                                <div class="assetBlock">
                                    <div style="height: 20px; overflow: hidden;" id="slideshow">
                                        <p style="display: block;">Hot tuần! - <span>50%</span> hãy sẵn sàng!
                                        </p>
                                        <p style="display: none;">Tiết kiệm tối đa <span>40%</span> Nhanh lên ưu đãi có
                                            hạn!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6 col-xs-12 col-sm-6 col-md-6 call-us"><i
                                    class="fa fa-clock-o"></i> Thứ 2 - CN : 07 giờ sáng đến 06 giờ chiều <i
                                    class="fa fa-phone"></i> 0964990582 </div>
                        </div>
                        <div class="fl-header-right">
                            <div class="fl-links">
                                <div class="no-js"> <a title="" class="clicker"></a>
                                    <div class="fl-nav-links">

                                        <h3>Tài khoản</h3>
                                        <ul class="links">
                                            @if ($obj)
                                                <li> {{  'Xin chào : ' . $obj->name }}</li>
                                                
                                                    @if($obj->vai_tro_id  != 2)
                                                      <li> <a href=" {{route('dashboard')}} ">Trang quản trị</a> </li>
                                                    @endif
                                               

                                                <li><a href=" {{ route('route_FE_Client_Logout') }} "
                                                        title="My Account">Logout</a></li>
                                            @else
                                                <li><a href=" {{ route('route_FE_Client_Login') }} "
                                                        title="My Account">Login</a></li>
                                                <li><a href="login.html" title="Wishlist">Register</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse navbar-collapse">
                                <form class="navbar-form" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="input-group-btn">
                                            <button type="submit" class="search-btn"> <span
                                                    class="glyphicon glyphicon-search"> <span
                                                        class="sr-only">Search</span> </span> </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!--links-->
                        </div>
                        <div class="fl-nav-menu">
                            <nav>
                                <div class="mm-toggle-wrap">
                                    <div class="mm-toggle"><i class="fa fa-bars"></i><span class="mm-label">Menu</span>
                                    </div>
                                </div>
                                <div class="nav-inner">
                                    <!-- BEGIN NAV -->
                                    <ul id="nav" class="hidden-xs">
                                        <li class="active"> <a class="level-top"
                                                href="{{ route('route_FE_Client_Home') }}"><span>Home</span></a>
                                        </li>
                                        <li class="level0 parent drop-menu"> <a class="level-top"
                                                href="{{ route('route_FE_Client_Products_list') }}"><span>Hãng
                                                    xe</span></a>
                                            {{-- đổ dữ liệu car branch --}}

                                            <ul class="level1">
                                                @foreach ($listCarBranch as $item)
                                                    <li class="level1 first"><a
                                                            href="{{ route('route_FE_Client_Products_branch', $item->id) }}"><span>
                                                                {{ $item->name }} </span></a></li>
                                                @endforeach
                                            </ul>


                                        </li>
                                        <li class="level0 parent drop-menu"> <a class="level-top"
                                                href="{{ route('route_FE_Client_Blogs') }}"><span>Bài viết</span></a>
                                        </li>
                                        <li class="level0 parent drop-menu"><a href="#"><span>Pages</span> </a>
                                    </ul>
                                    <!--nav-->
                                </div>
                            </nav>
                        </div>
                    </div>

                    <!--row-->

                </div>
            </div>
        </div>
    </div>
</header>
