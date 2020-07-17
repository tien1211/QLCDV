<?php

use Illuminate\Database\Seeder;

class CongDoanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=[
            [
                'dv_id' => 1,
                'cv_id' => 1,
                'lnv_id' => 1,
                'cdv_ten' => 'Nguyễn Nhựt Trường',
                'cdv_ngaysinh' => '1998-01-01',
                'cdv_gioitinh' => 1,#1 là nam 0 là nữ
                'cdv_cmnd' => '365214895',
                'cdv_nguyenquan' => 'Vĩnh Dragon',
                'cdv_diachi' => '111 Vĩnh Long',
                'cdv_sdt' => '0368541269',
                'cdv_email' => 'truongcute@gmail.com',
                'cdv_dantoc' => 'tày',
                'cdv_trinhdo' => '12/12',
                'cdv_tongiao' => 'Phật',
                'cdv_ngaythuviec' => '2016-05-20',
                'cdv_ngayvaonganh' => '2016-09-03',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi1.png',
                'cdv_username' => 'nhuttruong',
                'password' => bcrypt('truong1234'),
                'cdv_quyen' => 1
            ],[
                'dv_id' => 1,
                'cv_id' => 2,
                'lnv_id' => 1,
                'cdv_ten' => 'Huỳnh Thanh Phúc',
                'cdv_ngaysinh' => '1998-02-01',
                'cdv_gioitinh' => 1,#1 là nam 0 là nữ
                'cdv_cmnd' => '365214875',
                'cdv_nguyenquan' => 'Need Thơ',
                'cdv_diachi' => '111 Cần Thơ',
                'cdv_sdt' => '0368661269',
                'cdv_email' => 'phucpretty@gmail.com',
                'cdv_dantoc' => 'kinh',
                'cdv_trinhdo' => '12/12',
                'cdv_tongiao' => 'Hồi',
                'cdv_ngaythuviec' => '2016-05-06',
                'cdv_ngayvaonganh' => '2016-06-07',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi2.png',  
                'cdv_username' => 'phuchuynh',
                'password' => bcrypt('phuc1234'),
                'cdv_quyen' => 1,
            ],[
                'dv_id' => 1,
                'cv_id' => 3,
                'lnv_id' => 1,
                'cdv_ten' => 'Hồng Anh Tiến',
                'cdv_ngaysinh' => '1998-12-11',
                'cdv_gioitinh' => 1,#1 là nam 0 là nữ
                'cdv_cmnd' => '366240658',
                'cdv_nguyenquan' => 'Sóc Moon',
                'cdv_diachi' => '111 Sóc Trăng',
                'cdv_sdt' => '0368668869',
                'cdv_email' => 'tien@gmail.com',
                'cdv_dantoc' => 'Hoa',
                'cdv_trinhdo' => '12/12',
                'cdv_tongiao' => 'Không',
                'cdv_ngaythuviec' => '2016-05-15',
                'cdv_ngayvaonganh' => '2016-03-10',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi3.png', 
                'cdv_username' => 'tienb1607034',
                'password' => bcrypt('tien1211'),
                'cdv_quyen' => 1,
            ],[
                'dv_id' => 2,
                'cv_id' => 5,
                'lnv_id' => 2,
                'cdv_ten' => 'Nguyễn Ngọc Linh',
                'cdv_ngaysinh' => '1998-11-5',
                'cdv_gioitinh' => 0,
                'cdv_cmnd' => '326584125',
                'cdv_nguyenquan' => 'Sóc Moon',
                'cdv_diachi' => '456 American Xuyên',
                'cdv_sdt' => '0369854122',
                'cdv_email' => 'linhhandsome@gmail.com',
                'cdv_dantoc' => 'khrme',
                'cdv_trinhdo' => '12/12',
                'cdv_tongiao' => 'Hindu',
                'cdv_ngaythuviec' => '2017-02-03',
                'cdv_ngayvaonganh' => '2018-06-03',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi4.png',
                'cdv_username' => 'hehehe1212',
                'password' => bcrypt('hehehe1234'),
                'cdv_quyen' => 0
            ],



            [
                'dv_id' => 2,
                'cv_id' => 5,
                'lnv_id' => 2,
                'cdv_ten' => 'Hello',
                'cdv_ngaysinh' => '1978-01-01',
                'cdv_gioitinh' => 1,#1 là nam 0 là nữ
                'cdv_cmnd' => '365222895',
                'cdv_nguyenquan' => 'Bến Bamboo',
                'cdv_diachi' => '111 Bến Bamboo',
                'cdv_sdt' => '0368221269',
                'cdv_email' => 'bamboo@gmail.com',
                'cdv_dantoc' => 'Ê-Đê',
                'cdv_trinhdo' => '10/12',
                'cdv_tongiao' => 'Không',
                'cdv_ngaythuviec' => '2008-05-05',#mức hổ trợ sẽ bằng ngày hiện tại trừ đi ngày vào ngành lấy số năm truy xuất
                'cdv_ngayvaonganh' => '2007-03-09',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi5.png' ,
                'cdv_username' => 'hihihi1212',
                'password' => bcrypt('hihihi1234'),
                'cdv_quyen' => 0
            ],[
                'dv_id' => 2,
                'cv_id' => 3,
                'lnv_id' => 1,
                'cdv_ten' => 'Huỳnh Thanh Thế',
                'cdv_ngaysinh' => '1988-01-12',
                'cdv_gioitinh' => 1,#1 là nam 0 là nữ
                'cdv_cmnd' => '365255875',
                'cdv_nguyenquan' => 'Cần Thơ',
                'cdv_diachi' => '21 Cần Thơ',
                'cdv_sdt' => '0368331269',
                'cdv_email' => 'pretty@gmail.com',
                'cdv_dantoc' => 'kinh',
                'cdv_trinhdo' => '12/12',
                'cdv_tongiao' => 'Không',
                'cdv_ngaythuviec' => '2016-01-06',
                'cdv_ngayvaonganh' => '2016-03-10',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi6.png' ,
                'cdv_username' => 'hahaha1212',
                'password' => bcrypt('hahaha1234'),
                'cdv_quyen' => 0
            ],[
                'dv_id' => 2,
                'cv_id' => 4,
                'lnv_id' => 1,
                'cdv_ten' => 'Hồng Anh Đại',
                'cdv_ngaysinh' => '1999-12-11',
                'cdv_gioitinh' => 1,#1 là nam 0 là nữ
                'cdv_cmnd' => '366240898',
                'cdv_nguyenquan' => 'Sóc Trăng',
                'cdv_diachi' => '11 Sóc Trăng',
                'cdv_sdt' => '0368663869',
                'cdv_email' => 'daiiii@gmail.com',
                'cdv_dantoc' => 'Kinh',
                'cdv_trinhdo' => '12/12',
                'cdv_tongiao' => 'Không',
                'cdv_ngaythuviec' => '2016-02-05',
                'cdv_ngayvaonganh' => '2016-03-10',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi7.png' ,
                'cdv_username' => 'ngoclinh1212',
                'password' => bcrypt('ngoclinh1234'),
                'cdv_quyen' => 0

            ],[
                'dv_id' => 1,
                'cv_id' => 5,
                'lnv_id' => 2,
                'cdv_ten' => 'Sóc Kha',
                'cdv_ngaysinh' => '1998-06-05',
                'cdv_gioitinh' => 0,
                'cdv_cmnd' => '326566125',
                'cdv_nguyenquan' => 'Trà Vinh',
                'cdv_diachi' => '456 American Xuyên',
                'cdv_sdt' => '0369854122',
                'cdv_email' => 'sockha@gmail.com',
                'cdv_dantoc' => 'khrme',
                'cdv_trinhdo' => '12/12',
                'cdv_tongiao' => 'Phật',
                'cdv_ngaythuviec' => '2016-06-03',
                'cdv_ngayvaonganh' => '2018-02-03',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi8.png',
                'cdv_username' => 'sockha1212',
                'password' => bcrypt('sockha1234'),
                'cdv_quyen' => 0
            ],[
                'dv_id' => 1,
                'cv_id' => 5,
                'lnv_id' => 2,
                'cdv_ten' => 'Hải Sang',
                'cdv_ngaysinh' => '1998-08-05',
                'cdv_gioitinh' => 1,
                'cdv_cmnd' => '326366125',
                'cdv_nguyenquan' => 'Cần Thơ',
                'cdv_diachi' => '6 Cần Thơ',
                'cdv_sdt' => '0369854122',
                'cdv_email' => 'haisang@gmail.com',
                'cdv_dantoc' => 'Kinh',
                'cdv_trinhdo' => '12/12',
                'cdv_tongiao' => 'Không',
                'cdv_ngaythuviec' => '2006-06-03',
                'cdv_ngayvaonganh' => '2018-02-03',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi9.png',
                'cdv_username' => 'haisang1212',
                'password' => bcrypt('haisang1234'),
                'cdv_quyen' => 0
            ],[
                'dv_id' => 1,
                'cv_id' => 5,
                'lnv_id' => 2,
                'cdv_ten' => 'JohnSon',
                'cdv_ngaysinh' => '1976-06-05',
                'cdv_gioitinh' => 0,
                'cdv_cmnd' => '326563625',
                'cdv_nguyenquan' => 'Money Giang',
                'cdv_diachi' => '45 Tiền Giang',
                'cdv_sdt' => '0360254122',
                'cdv_email' => 'johnson11@gmail.com',
                'cdv_dantoc' => 'kinh',
                'cdv_trinhdo' => '12/12',
                'cdv_tongiao' => 'Phật',
                'cdv_ngaythuviec' => '2016-06-03',
                'cdv_ngayvaonganh' => '2018-02-03',
                'cdv_trangthai' => 1,
                'cdv_hinhanh' => 'hihi10.png',
                'cdv_username' => 'johnson1212',
                'password' => bcrypt('johnson1234'),
                'cdv_quyen' => 0
            ]
        ];
        DB::table('CongDoanVien')->insert($arr);
    }
}
