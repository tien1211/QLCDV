<?php

use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
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
                'lt_id' => '1',
                'tour_handk' => '2020-08-20 08:30:00',
                'tour_ngaybd' => '2020-08-21 05:30:00',
                'tour_ngaykt' => '2020-08-22 18:30:00',
                'tour_chiphi' => '5000000',
                'tour_soluong' => '20',
                'tour_phuongtien' => 'Ô Tô',
                'tour_diadiem' => 'Vũng Tàu',
                'tour_trongnam' => 1,
                'tour_trangthai' => 1
            ],[
                'lt_id' => '2',
                'tour_handk' => '2020-08-21 08:30:00',
                'tour_ngaybd' => '2020-08-22 05:30:00',
                'tour_ngaykt' => '2020-08-23 18:30:00',
                'tour_chiphi' => '2000000',
                'tour_soluong' => '20',
                'tour_phuongtien' => 'Ô Tô',
                'tour_diadiem' => 'Cần Thơ',
                'tour_trongnam' => 1,
                'tour_trangthai' => 1
            ]
        ];
        DB::table('Tour')->insert($arr);
    }
}
