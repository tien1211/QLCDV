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
                'tinh_trang' => 'Đã đăng ký'
            ],
            [
                'tinh_trang' => 'Đã hủy'
            ]
        ];
        DB::table('TinhTrangThuPhi')->insert($arr);
    }
}
