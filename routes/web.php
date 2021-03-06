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

Route::get('/home1', function () {
    return view('frontend.layout.master1');
})->name('admin1');

Route::get('/tourdadienra','IndexController@getTourdadienra')->name('tourdadienra');



Route::get('/home','IndexController@getIndex')->name('trangchu');
// get chi tiết tour
Route::get('/chitiet/{id}','IndexController@getChiTiet')->name('chitiettour');
// Đăng ký tour
Route::get('/dangkytour/{id}','IndexController@getFormDK')->name('dktour');
Route::post('/xndangkytour/{id}','IndexController@postDKT')->name('xndktour');
// Quản lý tour đã đăng ký
Route::get('/quanlytour','IndexController@getQLTour')->name('quanlytour');
Route::get('/danhsachnguoithamgia{id}','IndexController@getDSNTG')->name('DS_NTG');
Route::post('/xoanguoithamgia/{id}','IndexController@postXNTG')->name('XL_XNTTDK');
// Hủy đăng ký tour
Route::get('/huytour/{id}','IndexController@postDelete')->name('HUY_TOUR');
// Tìm kiếm tour
Route::get('/timkiemtour','IndexController@getSearch')->name('TK_TOUR');
//thông tin cá nhân
Route::get('/profile/{id}','IndexController@getProfile')->name('proFile');
//xác thực tài khoảng
Route::get('/dangnhap','AuthController@getLogin')->name('formLogin');
Route::post('/dangnhap-xl','AuthController@postLogin')->name('login');
Route::get('/dangxuat','AuthController@logOut')->name('logout');
Route::get('/doimatkhau/{id}','AuthController@getChangePass')->name('formChange');
Route::post('/changpass/{id}','AuthController@postChangePass')->name('changePass');


Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function () {

    Route::get('/admin', function () {
        return view('admin.layout.master');
    })->name('admin');

    Route::group(['prefix' => 'CongDoanVien'], function () {        
        //Import Excel
        Route::get('/CDV_Import','CongDoanVienController@getImport')->name('CDV_formImp');
        Route::post('/CDV_Import/Import','CongDoanVienController@Import')->name('Import');
        //Export Excel
        Route::get('/CDV_Export/Export','CongDoanVienController@Export')->name('CDV_Export');
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
        Route::get('/CDV_Timkiem', 'CongDoanVienController@postTimkiem')->name('CDV_Timkiem');
        // Danh sách công đoàn viên theo đơn vị
        Route::get('/CDV_DSDV/{id}','CongDoanVienController@getDSDV')->name('CDV_DSDV');
        //Công đoàn viên cập nhật mức hổ trợ
        Route::get('/CDV_CNMHT','CongDoanVienController@updateCDV')->name('CDV_CNMHT');
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
        // Tìm kiếm đơn vị
        Route::get('/DV_Timkiem', 'DonViController@postTimkiem')->name('DV_Timkiem');
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
        // Chi tiết tour
        Route::get('/TOUR_ChiTiet/{id}','TourController@getchitietTour')->name('TOUR_ChiTiet');
        // Tìm kiếm
        Route::get('/TOUR_Timkiem', 'TourController@postTimkiem')->name('TOUR_Timkiem');
        // Đăng ký thêm cho người tham giai
        Route::get('/TOUR_DKT/{id}','TourController@getDKT')->name('TOUR_DKT');
        Route::post('/TOUR_DKT/{id}','TourController@postDKT')->name('XLTOUR_DKT');
        Route::post('search/name','TourController@getSearchAjax')->name('search');
        // Xóa người đăng ký tham gia
        Route::post('/TOUR_XNDK/{id}','TourController@postXNDK')->name('XLTOUR_XNDK');
        // Thêm giai đoạn
        Route::post('/ThemGD','TourController@postThemGD')->name('GD_Them');
        //Hình ảnh liên quan
        Route::get('/Tour_HinhAnh/{id}','TourController@getHinh')->name('Tour_HinhAnh');
        //Thêm hình liên quan
        Route::post('/Tour_ThemHinhAnh/{id}','TourController@postHinh')->name('Tour_ThemHinh');
        //Sua hình ảnh
        Route::post('/Tour_SuaHinhAnh/{id}','TourController@postSuaHinh')->name('Tour_SuaHinh');
        //Xoa hình ảnh
        Route::get('/Tour_XoaHinhAnh','TourController@getXoaHinh')->name('Tour_XoaHinh');
    });
    Route::group(['prefix' => 'LichTrinh'], function () {
    //Danh sách lịch trình
        Route::get('LT_DanhSach','LichTrinhController@getDanhSach')->name('LT_DanhSach');
        //Form thêm lịch trình
        Route::get('/LT_ThemLT','LichTrinhController@getThem')->name('LT_Them');
        Route::post('/LT_ThemLT','LichTrinhController@postThem')->name('LT_XLThem');
        //Form sửa lịch trình
        Route::get('/LT_SuaLT/{id}','LichTrinhController@getSua')->name('LT_Sua');
        Route::post('/LT_SuaLT/{id}','LichTrinhController@postSua')->name('LT_XLSua');
        //Xóa lịch trình
        Route::get('/LT_XoaLT/{id}', 'LichTrinhController@getXoa')->name('LT_Xoa');
        //Tìm kiếm lịch trình
        Route::get('/LT_Timkiem', 'LichTrinhController@getTimkiem')->name('LT_Timkiem');
    });
});




