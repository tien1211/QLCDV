<?php

use Illuminate\Database\Seeder;

class LoaiNhanVienSeeder extends Seeder
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
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ],[
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ],[
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ],[
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ],[
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ],[
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ],[
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ],[
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ],[
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ],[
                'lnv_ten' => '',
                'lnv_trangthai' => ''
            ]
        ];
        DB::table('LoaiNhanVien')->insert($arr);
    }
}
