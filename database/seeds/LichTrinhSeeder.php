<?php

use Illuminate\Database\Seeder;

class LichTrinhSeeder extends Seeder
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
                'lt_ten' => 'Tiền Giang - Vũng Tàu',
                'lt_file' => 'LichTrinhVungTau.xlsx',
                'lt_mota' => 'hihi',
                'lt_trangthai' => 1
            ],
            [
                'lt_ten' => 'Tiền Giang - Cần Thơ',
                'lt_file' => 'LichTrinhCanTho.xlsx',
                'lt_mota' => 'hehe',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Tiền Giang - Đà Lạt',
                'lt_file' => 'LichTrinhDaLat.xlsx',
                'lt_mota' => 'hehe',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Tiền Giang - Đà Nẵng',
                'lt_file' => 'LichTrinhDaNang.xlsx',
                'lt_mota' => 'hehe',
                'lt_trangthai' => 1
            ]
            ,
            [
                'lt_ten' => 'Tiền Giang - Hội An',
                'lt_file' => 'LichTrinhHoiAn.xlsx',
                'lt_mota' => 'hehe',
                'lt_trangthai' => 1
            ]

        ];
        DB::table('LichTrinh')->insert($arr);
    }
}
