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
    Route::group(['prefix' => 'ToChuc'], function () {
        // Thông tin tổ Chức
        Route::get('/ToChuc', 'ToChucController@getToChuc')->name('TT_ToChuc');
        //Form cập nhật tổ chức
        Route::get('/CN_ToChuc', 'ToChucController@getSua')->name('CN_ToChuc');
        Route::post('/LCN_ToChuc', 'ToChucController@postSua')->name('LCN_ToChuc');

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

        //Form đặt tour
        // Route::get('/TOUR_DatTour/{id}','TourController@getDat')->name('TOUR_Dat');
        // Route::post('/TOUR_DatTour/{id}','TourController@postDat')->name('TOUR_XLDat');



        //Tìm kiếm
        Route::post('/TOUR_Timkiem', 'TourController@postTimkiem')->name('TOUR_Timkiem');



    });
    Route::group(['prefix' => 'LichTrinh'], function () {

        //Danh sách lịch trình
    Route::get('LT_DanhSach','LichTrinhController@getDanhSach')->name('LT_DanhSach');

    //Form thêm lịch trình
    Route::get('/LT_ThemLT','LichTrinhController@getThem')->name('LT_Them');
    Route::post('/LT_ThemLT','LichTrinhController@postThem')->name('LT_XLThem');
    });

     //Form sửa lịch trình
     Route::get('/LT_SuaLT/{id}','LichTrinhController@getSua')->name('LT_Sua');
     Route::post('/LT_SuaLT/{id}','LichTrinhController@postSua')->name('LT_XLSua');

     //Xóa lịch trình
     Route::get('/LT_XoaLT/{id}', 'LichTrinhController@getXoa')->name('LT_Xoa');
});
