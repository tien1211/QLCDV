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
                'tour_handk' => '2020-01-21',
                'tour_ngaybd' => '2020-08-21',
                'tour_ngaykt' => '2020-08-22',
                'tour_chiphi' => '5000000',
                'tour_soluong' => '20',
                'gd_id' => '1',
                'tour_daily' => 'abc',
                'tour_hinhanh' => 'tour-vungtau.png',
                'tour_trangthai' => 1,


            ],
            [
                'lt_id' => '2',

                'tour_handk' => '2020-08-21',
                'tour_ngaybd' => '2020-08-22',
                'tour_ngaykt' => '2020-08-23',
                'tour_chiphi' => '2000000',
                'tour_soluong' => '20',
                'gd_id' => '2',
                'tour_daily' => 'xyz',
                'tour_hinhanh' => 'tour-cantho.png',
                'tour_trangthai' => 1,

            ],
            [
                'lt_id' => '3',
                'tour_handk' => '2020-08-25',
                'tour_ngaybd' => '2020-08-10',
                'tour_ngaykt' => '2020-08-27',
                'tour_chiphi' => '4500000',
                'tour_soluong' => '30',
                'gd_id' => '3',
                'tour_daily' => 'MyThoTravel',
                'tour_hinhanh' => 'tour-dalat.png',
                'tour_trangthai' => 1,

            ],
            [
                'lt_id' => '4',
                'tour_handk' => '2021-01-25',
                'tour_ngaybd' => '2021-01-10',
                'tour_ngaykt' => '2021-01-27',
                'tour_chiphi' => '3500000',
                'tour_soluong' => '25',
                'gd_id' => '3',
                'tour_daily' => 'MyThoTravel',
                'tour_hinhanh' => 'tour-danang.png',
                'tour_trangthai' => 1,

            ],
            [
                'lt_id' => '4',
                'tour_handk' => '2019-01-25',
                'tour_ngaybd' => '2019-01-10',
                'tour_ngaykt' => '2019-01-27',
                'tour_chiphi' => '3500000',
                'tour_soluong' => '25',
                'gd_id' => '1',
                'tour_daily' => 'MyThoTravel',
                'tour_hinhanh' => 'tour-danang.png',
                'tour_trangthai' => 1,
            ],
            [
                'lt_id' => '4',
                'tour_handk' => '2020-01-25',
                'tour_ngaybd' => '2020-01-10',
                'tour_ngaykt' => '2020-01-27',
                'tour_chiphi' => '3500000',
                'tour_soluong' => '25',
                'gd_id' => '2',
                'tour_daily' => 'MyThoTravel',
                'tour_hinhanh' => 'tour-danang.png',
                'tour_trangthai' => 1,
            ]
        ];
        DB::table('Tour')->insert($arr);
    }
}
