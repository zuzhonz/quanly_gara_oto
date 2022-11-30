<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\Booking_TimeController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\CarBranchController;
use App\Http\Controllers\Admin\CarAlbumController;
use App\Http\Controllers\Admin\CarColorController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServicesControllername;
use App\Http\Controllers\Admin\TaiKhoanController;
use App\Http\Controllers\Admin\BlogContronller;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
//client
use App\Http\Controllers\Client\HomeClientController;
use App\Http\Controllers\Client\ProductsClientController;
use App\Http\Controllers\Client\AboutClientController;
use App\Http\Controllers\Client\BlogClientController;
use App\Http\Controllers\Client\ContactClientController;
use App\Http\Controllers\Client\UserClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// =========== route admin
Route::prefix('admin')->middleware('User')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Products
    Route::get('products', [ProductsController::class, 'index'])->name('products.index');

    Route::prefix('/car-branch')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [CarBranchController::class, 'index'])->name('Car_Branch');
        Route::get('/delete/{id}', [CarBranchController::class, 'destroy'])->name('Delete_Car_Branch');
        Route::get('/edit/{id}', [CarBranchController::class, 'edit'])->name('Edit_Car_Branch');
        Route::post('/update', [CarBranchController::class, 'update'])->name('Update_Car_Branch');
        Route::match(['get', 'post'], 'add', [CarBranchController::class, 'store'])->name('Add_Car_Branch');
    });

    /// route role
    Route::prefix('/role')->name('route_BE_Admin_')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('List_Role');
        Route::get('/delete/{id}', [RoleController::class, 'destroy'])->name('Delete_Role');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('Edit_Role');
        Route::post('/update', [RoleController::class, 'update'])->name('Update_Role');
        Route::match(['get', 'post'], 'add', [RoleController::class, 'store'])->name('Add_Role');
    });

    /// route role
    Route::prefix('/banner')->name('route_BE_Admin_')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('Banner');
        Route::get('/delete/{id}', [BannerController::class, 'destroy'])->name('Delete_Banner');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('Edit_Banner');
        Route::post('/update', [BannerController::class, 'update'])->name('Update_Banner');
        Route::match(['get', 'post'], 'add', [BannerController::class, 'store'])->name('Add_Banner');
    });

    Route::get('/profile', [profileController::class, 'index'])->name('Profile');
    Route::post('/profile', [profileController::class, 'update'])->name('Profile');

    Route::prefix('/tai-khoan')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [TaiKhoanController::class, 'index'])->name('Tai_Khoan');
        Route::get('/delete/{id}', [TaiKhoanController::class, 'destroy'])->name('Delete_Tai_Khoan');
        Route::get('/edit/{id}', [TaiKhoanController::class, 'edit'])->name('Edit_Tai_Khoan');
        Route::post('/update', [TaiKhoanController::class, 'update'])->name('Update_Tai_Khoan');
        Route::match(['get', 'post'], 'add', [TaiKhoanController::class, 'store'])->name('Add_Tai_Khoan');
    });

    Route::prefix('/cars')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [CarsController::class, 'index'])->name('Cars');
        Route::get('/delete/{id}', [CarsController::class, 'destroy'])->name('Delete_Cars');
        Route::get('/edit/{id}', [CarsController::class, 'edit'])->name('Edit_Cars');
        Route::post('/edit', [CarsController::class, 'update'])->name('Update_Cars');
        Route::get('/updateCarHot/{id}', [CarsController::class, 'updateCarHot'])->name('updateCarHot');
        Route::match(['get', 'post'], 'add', [CarsController::class, 'store'])->name('Add_Cars');
    });

    Route::prefix('/services')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [ServicesControllername::class, 'index'])->name('Services');
        Route::get('/delete/{id}', [ServicesControllername::class, 'destroy'])->name('Delete_Services');
        Route::get('/edit/{id}', [ServicesControllername::class, 'edit'])->name('Edit_Services');
        Route::post('/edit', [ServicesControllername::class, 'update'])->name('Update_Services');
        Route::match(['get', 'post'], 'add', [ServicesControllername::class, 'store'])->name('Add_Services');
    });

    Route::prefix('/employees')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [EmployeesController::class, 'index'])->name('Employees');
        Route::get('/delete/{id}', [EmployeesController::class, 'destroy'])->name('Delete_Employees');
        Route::get('/edit/{id}', [EmployeesController::class, 'edit'])->name('Edit_Employees');
        Route::post('/edit', [EmployeesController::class, 'update'])->name('Update_Employees');
        Route::match(['get', 'post'], 'add', [EmployeesController::class, 'store'])->name('Add_Employees');
    });

    Route::prefix('/booking_time')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [Booking_TimeController::class, 'index'])->name('Booking_Time');
        Route::get('/delete/{id}', [Booking_TimeController::class, 'destroy'])->name('Delete_Booking_Times');
        Route::get('/edit/{id}', [Booking_TimeController::class, 'edit'])->name('Edit_Booking_Time');
        Route::post('/edit', [Booking_TimeController::class, 'update'])->name('Update_Booking_Time');
        Route::match(['get', 'post'], 'add', [Booking_TimeController::class, 'store'])->name('Add_Booking_Time');
    });

    Route::prefix('/booking')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [BookingController::class, 'index'])->name('Booking');
        Route::get('/delete/{id}', [BookingController::class, 'destroy'])->name('Delete_Booking');
        Route::get('/edit/{id}', [BookingController::class, 'edit'])->name('Edit_Booking');
        Route::post('/edit', [BookingController::class, 'update'])->name('Update_Booking');
        Route::get('/updateStatus/{id}', [BookingController::class, 'updateStatus'])->name('updateStatus');
        Route::match(['get', 'post'], 'add', [BookingController::class, 'store'])->name('Add_Booking');
    });


    Route::get('/calendar', [CalendarController::class, 'index'])->name('Calendar');

    Route::prefix('/clients')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [EmployeesController::class, 'index'])->name('Clients');
        Route::get('/delete/{id}', [EmployeesController::class, 'destroy'])->name('Delete_Clients');
        Route::get('/edit/{id}', [EmployeesController::class, 'edit'])->name('Edit_Clients');
        Route::post('/edit', [EmployeesController::class, 'update'])->name('Update_Clients');
        Route::match(['get', 'post'], 'add', [EmployeesController::class, 'store'])->name('Add_Clients');
    });

    //route crud car color
    Route::prefix('car-color')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [CarColorController::class, 'index'])->name('car_color');
        Route::match(['post'], '/store', [CarColorController::class, 'store'])->name('color_store');
        Route::get('/create', [CarColorController::class, 'create'])->name('color_create');

        Route::get('/delete/{id}', [CarColorController::class, 'destroy'])->name('color_delete');

        Route::get('/edit/{id}', [CarColorController::class, 'edit'])->name('color_edit');
        Route::post('/update', [CarColorController::class, 'update'])->name('color_update');
    });

    // route car blog

    Route::prefix('bai-viet')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [BlogContronller::class, 'index'])->name('car_blog');
        Route::get('/', [BlogContronller::class, 'index'])->name('car_blog');

        Route::post('/store', [BlogContronller::class, 'store'])->name('blog_store');
        Route::get('/create', [BlogContronller::class, 'create'])->name('blog_create');

        Route::get('/delete/{id}', [BlogContronller::class, 'destroy'])->name('blog_delete');

        Route::get('/edit/{id}', [BlogContronller::class, 'edit'])->name('blog_edit');
        Route::post('/update', [BlogContronller::class, 'update'])->name('blog_update');
    });
    //end route car blog

    Route::prefix('/car-album')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [CarAlbumController::class, 'index'])->name('Car_Album');
        Route::get('/delete/{id}', [CarAlbumController::class, 'destroy'])->name('Delete_Car_Album');
        Route::get('/edit/{id}', [CarAlbumController::class, 'edit'])->name('Edit_Car_Album');
        Route::post('/update', [CarAlbumController::class, 'update'])->name('Update_Car_Album');
        Route::match(['get', 'post'], 'add', [CarAlbumController::class, 'store'])->name('Add_Car_Album');
    });

    Route::prefix('/staff')->name('route_BE_Admin_')->group(function () {
        Route::get('/list', [StaffController::class, 'index'])->name('Staff');
        Route::get('/delete/{id}', [StaffController::class, 'destroy'])->name('Delete_Staff');
        Route::get('/edit/{id}', [StaffController::class, 'edit'])->name('Edit_Staff');
        Route::post('/update', [StaffController::class, 'update'])->name('Update_Staff');
        Route::match(['get', 'post'], 'add', [StaffController::class, 'store'])->name('Add_Staff');
    });
});
Route::prefix('/')->name('route_FE_Client_')->group(function () {
    Route::get('/', [HomeClientController::class, 'index'])->name('Home');

    Route::get('/products', [ProductsClientController::class, 'index'])->name('Products');
    Route::get('/products-list', [ProductsClientController::class, 'list'])->name('Products_list');
    Route::get('/product/{id}', [ProductsClientController::class, 'detail'])->name('Products_detail');
    Route::match(['get', 'post'], '/product/filter', [ProductsClientController::class, 'filter_car'])->name('Products_filter');
    Route::match(['get', 'post'], '/product/filter/home', [HomeClientController::class, 'filter_home'])->name('Home_filter');

    Route::get('/product/branch/{brand}/', [ProductsClientController::class, 'list_car_branch'])->name('Products_branch');

    Route::match(['get', 'post'], '/product/booking', [ProductsClientController::class, 'add_booking'])->name('Products_booking');

    Route::get('/about', [AboutClientController::class, 'index'])->name('About');
    Route::get('/contact', [ContactClientController::class, 'index'])->name('Contact');

    Route::get('/blogs', [BlogClientController::class, 'index'])->name('Blogs');
    Route::get('/blog/{id}', [BlogClientController::class, 'detail'])->name('Blogs_detail');

    Route::get('/user', [UserClientController::class, 'index'])->name('User');
    Route::match(['get', 'post'], '/login', [LoginController::class, 'Login'])->name('Login');
    Route::get('/logout', [LoginController::class, 'Logout'])->name('Logout');
});