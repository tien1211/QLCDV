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
                'lnv_ten' => 'Nhân Viên Chính Thức',
                'lnv_trangthai' => 1
            ],[
                'lnv_ten' => 'Nhân Viên Thực Tập',
                'lnv_trangthai' => 1
            ]
        ];
        DB::table('LoaiNhanVien')->insert($arr);
    }
}
