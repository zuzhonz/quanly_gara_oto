@extends('client.layout.master')

@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Login or Create an Account</h2>
                    </div>
                </div>
                <!--col-xs-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>


    <!-- BEGIN Main Container -->

    <div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">

        <div class="main">
            <div class="account-login container">
                <!--page-title-->

                <form action=" {{ route('route_FE_Client_Login') }} " method="post" id="login-form">
                    @csrf
                    {{-- <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr"> --}}
                    <fieldset class="col2-set">
                        <div class="col-1 new-users">
                            <strong>New Customers</strong>
                            <div class="content">


                                <div class="buttons-set">
                                    <button type="button" title="Create an Account" class="button create-account"
                                        onClick=""><span><span>Tạo tài khoản</span></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <strong>Đăng ký</strong>
                            <div class="content">


                                <ul class="form-list">
                                    <li>
                                        <label for="email">Nhập email<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="text" name="email" value="" id="email"
                                                class="input-text required-entry validate-email" title="Email Address">
                                            @error('email')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <label for="pass">Nhập mật khẩu<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="password" class="input-text required-entry validate-password"
                                                id="pass" name="password" title="Password">
                                            @error('password')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </li>
                                </ul>
                                <div class="remember-me-popup">
                                    <div class="remember-me-popup-head" style="display:none">

                                        <a href="#" class="remember-me-popup-close" onClick="showDiv()"
                                            title="Close">Close</a>
                                    </div>
                                    <div class="remember-me-popup-body" style="display:none">

                                        <div class="remember-me-popup-close-button a-right">
                                            <a href="#" class="remember-me-popup-close button" title="Close"
                                                onClick="
                                  showDiv()"><span>Close</span></a>
                                        </div>
                                    </div>
                                </div>

                                {{-- <p class="required">* Required Fields</p> --}}



                                <div class="buttons-set">

                                    <button type="submit" class="button login" title="Login" id="send2"><span>Đăng
                                            nhập</span></button>

                                    <a href="#" class="forgot-word">Quên mật khẩu</a>
                                </div>
                                <!--buttons-set-->
                            </div>
                            <!--content-->
                        </div>
                        <!--col-2 registered-users-->
                    </fieldset>
                    <!--col2-set-->
                </form>

            </div>
            <!--account-login-->

        </div>
        <!--main-container-->

    </div>
    <!--col1-layout-->
@endsection
