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
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ],[
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ],[
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ],[
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ],[
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ],[
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ],[
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ],[
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ],[
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ],[
                'tk_tendangnhap' => '',
                'cdv_id' => '',
                'tk_matkhau' => bcrypt(''),
                'tk_trangthai' => ''
            ]
        ];
        DB::table('TaiKhoan')->insert($arr);
    }
}
