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
});
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
        Route::post('/CDV_XoaCDV/{id}', 'CongDoanVienController@postXoa')->name('CDV_XLXoa');
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
        
    });
});