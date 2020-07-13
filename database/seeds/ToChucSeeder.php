<?php

use Illuminate\Database\Seeder;

class ToChucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('ToChuc')->insert([
                'tc_ten' => "Công Đoàn Trung Tâm CNTT - Viễn Thông Tiền Giang",
                'tc_tructhuoc' => "Công Đoàn Cơ Sở Tiền Giang",
                'tc_trangthai' => 1,#1 la hien #0 la da xoa
                'tc_gioithieu' => "Công Đoàn Cơ Sở Tiền Giang",
                'tc_nhiemvu' => "Công Đoàn Cơ Sở Tiền Giang",
            ]);
        
    }
}
