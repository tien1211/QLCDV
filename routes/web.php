<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.layout.master');
})->name('admin');

Route::get('/dangnhap','AuthController@getLogin')->name('formLogin');
Route::post('/dangnhap-xl','AuthController@postLogin')->name('login');


Route::group(['prefix' => 'admin'], function () {
    
    Route::group(['prefix' => 'CongDoanVien'], function () {
        //Danh Sách Công Đoàn Viên
        Route::get('/CDV_DS', 'CongDoanVienController@getDanhSach')->name('CDV_DanhSach');

        //Form Thêm Công Đoàn Viên
        Route::get('/CDV_FormThem', 'CongDoanVienController@getThem')->name('CDV_Them');
        Route::post('/CDV_ThemCDV', 'CongDoanVienController@postThem')->name('CDV_XLThem');
        //Form Sửa Công Đoàn Viên
        Route::get('/CDV_FormSua/{id}', 'CongDoanVienController@getSua')->name('CDV_Sua');
        Route::post('/CDV_SuaCDV/{id}', 'CongDoanVienController@postSua')->name('CDV_XLSua');
        //Form Xóa Công Đoàn Viên
        Route::get('/CDV_XoaCDV/{id}', 'CongDoanVienController@getXoa')->name('CDV_Xoa');

        //Form Chi tiết
        Route::get('/CDV_ChiTietCDV/{id}', 'CongDoanVienController@getchitietCDV')->name('CDV_ChiTiet');
        
        //Tìm kiếm
        Route::post('/CDV_Timkiem', 'CongDoanVienController@postTimkiem')->name('CDV_Timkiem');
    });
    Route::group(['prefix' => 'DonVi'], function () {
        // Danh sách đơn vị
        Route::get('/DonVi', 'DonViController@getDonVi')->name('DV_DanhSach');
        // Form thêm đơn vị
        Route::get('/DonVi_FormThem', 'DonViController@getThem')->name('DV_Them');
        Route::post('/DonVi_ThemDV', 'DonViController@postThem')->name('DV_XLThem');
        // Form sửa đơn vị
        Route::get('/DV_FormSua/{id}', 'DonViController@getSua')->name('DV_Sua');
        Route::post('/DV_SuaDV/{id}', 'DonViController@postSua')->name('DV_XLSua');
        //Form Xóa đơn vị
        Route::get('/DV_XoaDV/{id}', 'DonViController@getXoa')->name('DV_Xoa');

    });
    Route::group(['prefix' => 'Tour'], function () {
        //Danh sach tour
        Route::get('TOUR_DS','TourController@getDanhSach')->name('TOUR_DanhSach');

        //Form thêm tour
        Route::get('/TOUR_ThemTour','TourController@getThem')->name('TOUR_Them');
        Route::post('/TOUR_ThemTour','TourController@postThem')->name('TOUR_XLThem');

        //Form sửa tour
        Route::get('/TOUR_SuaTour/{id}','TourController@getSua')->name('TOUR_Sua');
        Route::post('/TOUR_SuaTour/{id}','TourController@postSua')->name('TOUR_XLSua');

        //Form xóa tour
        Route::get('/TOUR_XoaTour/{id}', 'TourController@getXoa')->name('TOUR_Xoa');

        //Tìm kiếm
        Route::post('/TOUR_Timkiem', 'TourController@postTimkiem')->name('TOUR_Timkiem');


    });

});
