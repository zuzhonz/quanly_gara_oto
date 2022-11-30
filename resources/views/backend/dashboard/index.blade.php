@extends('backend.layout.master')

@section('page-title', 'Dashboard')

@section('page-content')
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Số lượng xe </div>
                            <div class="stat-digit">{{ $cars_total }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success w-{{ $cars_total }}" role="progressbar"
                                aria-valuenow="{{ $cars_total }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Số lượng nhân viên</div>
                            <div class="stat-digit">{{ $employees_total }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary w-{{ $employees_total }}" role="progressbar"
                                aria-valuenow="{{ $employees_total }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Số lượng bài viết</div>
                            <div class="stat-digit">{{ $blogs_total }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning w-{{ $blogs_total }}" role="progressbar"
                                aria-valuenow="{{ $blogs_total }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Lịch đã đặt</div>
                            <div class="stat-digit">{{ $booking_total }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger w-{{ $booking_total }}" role="progressbar"
                                aria-valuenow="{{ $booking_total }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sales Overview</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8">
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="m-t-10">
                            <h4 class="card-title">Customer Feedback</h4>
                            <h2 class="mt-3">385749</h2>
                        </div>
                        <div class="widget-card-circle mt-5 mb-5" id="info-circle-card">
                            <i class="ti-control-shuffle pa"></i>
                        </div>
                        <ul class="widget-line-list m-b-15">
                            <li class="border-right">92% <br><span class="text-success"><i class="ti-hand-point-up"></i>
                                    Positive</span></li>
                            <li>8% <br><span class="text-danger"><i class="ti-hand-point-down"></i>Negative</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
