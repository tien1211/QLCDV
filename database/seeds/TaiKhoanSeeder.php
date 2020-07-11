<?php

use Illuminate\Database\Seeder;

class TaiKhoanSeeder extends Seeder
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
                'tk_tendangnhap' => 'tienb1607034',
                'cdv_id' => '3',
                'tk_matkhau' => bcrypt('tien1211'),
                'tk_quyen' => '1',
                'tk_trangthai' => 1
            ],[
                'tk_tendangnhap' => 'phuchuynh',
                'cdv_id' => '2',
                'tk_matkhau' => bcrypt('phuc1234'),
                'tk_quyen' => '1',
                'tk_trangthai' => 1
            ],[
                'tk_tendangnhap' => 'nhuttruong',
                'cdv_id' => '1',
                'tk_matkhau' => bcrypt('truong1234'),
                'tk_quyen' => '1',
                'tk_trangthai' => 1
            ],[
                'tk_tendangnhap' => 'hehehe1212',
                'cdv_id' => '4',
                'tk_matkhau' => bcrypt('hehehe1234'),
                'tk_quyen' => '0',
                'tk_trangthai' => 1
            ],[
                'tk_tendangnhap' => 'hihihi1212',
                'cdv_id' => '5',
                'tk_matkhau' => bcrypt('hihihi1234'),
                'tk_quyen' => '0',
                'tk_trangthai' => 1
            ],[
                'tk_tendangnhap' => 'hahaha1212',
                'cdv_id' => '6',
                'tk_matkhau' => bcrypt('hahaha1234'),
                'tk_quyen' => '0',
                'tk_trangthai' => 1
            ],[
                'tk_tendangnhap' => 'ngoclinh1212',
                'cdv_id' => '4',
                'tk_matkhau' => bcrypt('ngoclinh1234'),
                'tk_quyen' => '0',
                'tk_trangthai' => 1
            ],[
                'tk_tendangnhap' => 'sockha1212',
                'cdv_id' => '8',
                'tk_matkhau' => bcrypt('sockha1234'),
                'tk_quyen' => '0',
                'tk_trangthai' => 1
            ],[
                'tk_tendangnhap' => 'haisang1212',
                'cdv_id' => '9',
                'tk_matkhau' => bcrypt('haisang1234'),
                'tk_quyen' => '0',
                'tk_trangthai' => 1
            ],[
                'tk_tendangnhap' => 'johnson1212',
                'cdv_id' => '10',
                'tk_matkhau' => bcrypt('johnson1234'),
                'tk_quyen' => '0',
                'tk_trangthai' => 1
            ]
        ];
        DB::table('TaiKhoan')->insert($arr);
    }
}
