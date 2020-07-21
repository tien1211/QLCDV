<?php

use Illuminate\Database\Seeder;

class TinhTrangThuPhiSeeder extends Seeder
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
                'tinh_trang' => 'Đã đóng phí'
            ],[
                'tinh_trang' => 'Chưa đóng phí'
            ]
        ];
        DB::table('TinhTrangThuPhi')->insert($arr);
    }
}
