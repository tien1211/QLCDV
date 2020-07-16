<?php

use Illuminate\Database\Seeder;

class DonViSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [

            [
            'dv_ten' => "Trung Tâm CNTT Tiền Giang",
            'dv_trangthai' => 1,#1 la hien #0 la da xoa
            'dv_mota' => "Công Đoàn Cơ Sở Tiền Giang",
            'dv_tructhuoc_id' => 0,
        ],[
            'dv_ten' => "Viễn Thông Tiền Giang",
            'dv_trangthai' => 1,#1 la hien #0 la da xoa
            'dv_mota' => "Công Đoàn Cơ Sở Tiền Giang",
            'dv_tructhuoc_id' => 1,
            ]
        ];
            DB::table('DonVi')->insert($arr);
        
    }
}
