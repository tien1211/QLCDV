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
                'gd_id' => '1',
                'tour_handk' => '2020-08-20',
                'tour_ngaybd' => '2020-08-21',
                'tour_ngaykt' => '2020-08-22',
                'tour_chiphi' => '5000000',
                'tour_soluong' => '20',
                'tour_trangthai' => 1,
                'tour_daily' => 'abc',
                'tour_mota' => 'abc',
            ],[
                'lt_id' => '2',
                'gd_id' => '2',
                'tour_handk' => '2020-08-21',
                'tour_ngaybd' => '2020-08-22',
                'tour_ngaykt' => '2020-08-23',
                'tour_chiphi' => '2000000',
                'tour_soluong' => '20',
                'tour_trangthai' => 1,
                'tour_daily' => 'xyz',
                'tour_mota' => 'xyz',
            ]
        ];
        DB::table('Tour')->insert($arr);
    }
}
