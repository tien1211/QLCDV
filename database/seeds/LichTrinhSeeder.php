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
                'lt_mota' => 'cái gì vậy chèn',
                'lt_trangthai' => 1
            ],[
                'lt_ten' => 'Tiền Giang - Cần Thơ',
                'lt_file' => 'LichTrinhCanTho.xlsx',
                'lt_mota' => 'hehe',
                'lt_trangthai' => 1
            ]
        ];
        DB::table('LichTrinh')->insert($arr);
    }
}
