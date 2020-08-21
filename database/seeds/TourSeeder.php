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
                'tour_ngaybd' => '2020-01-21',
                'tour_ngaykt' => '2020-01-23',
                'tour_chiphi' => '1900000',
                'tour_soluong' => '20',
                'gd_id' => '1',
                'tour_daily' => 'ivivu',
                'tour_hinhanh' => 'ivivu-hai-dang-nam-du.jpg',
                'tour_trangthai' => 1,
            ],
            [
                'lt_id' => '2',
                'tour_handk' => '2020-08-21',
                'tour_ngaybd' => '2020-08-22',
                'tour_ngaykt' => '2020-08-24',
                'tour_chiphi' => '1400000',
                'tour_soluong' => '20',
                'gd_id' => '1',
                'tour_daily' => 'ivivu',
                'tour_hinhanh' => 'ivivu-binh-ba.jpg',
                'tour_trangthai' => 1,
            ],
            [
                'lt_id' => '3',
                'tour_handk' => '2020-09-20',
                'tour_ngaybd' => '2020-09-24',
                'tour_ngaykt' => '2020-09-28',
                'tour_chiphi' => '1500000',
                'tour_soluong' => '20',
                'gd_id' => '1',
                'tour_daily' => 'ivivu',
                'tour_hinhanh' => 'ivivu-binhhung.jpg',
                'tour_trangthai' => 1,
            ],
            [
                'lt_id' => '4',
                'tour_handk' => '2021-01-25',
                'tour_ngaybd' => '2021-02-1',
                'tour_ngaykt' => '2021-02-5',
                'tour_chiphi' => '1500000',
                'tour_soluong' => '15',
                'gd_id' => '2',
                'tour_daily' => 'MyThoTravel',
                'tour_hinhanh' => 'tour-danang.png',
                'tour_trangthai' => 1,
            ],
            [
                'lt_id' => '5',
                'tour_handk' => '2021-01-15',
                'tour_ngaybd' => '2021-01-20',
                'tour_ngaykt' => '2021-01-25',
                'tour_chiphi' => '4000000',
                'tour_soluong' => '20',
                'gd_id' => '2',
                'tour_daily' => 'ivivu',
                'tour_hinhanh' => 'tour-hoian.png',
                'tour_trangthai' => 1,
            ],
            [
                'lt_id' => '6',
                'tour_handk' => '2021-02-05',
                'tour_ngaybd' => '2021-02-10',
                'tour_ngaykt' => '2021-02-15',
                'tour_chiphi' => '1300000',
                'tour_soluong' => '20',
                'gd_id' => '2',
                'tour_daily' => 'Việt Nam Tour',
                'tour_hinhanh' => 'tour-dalat.png',
                'tour_trangthai' => 1,
            ],
            [
                'lt_id' => '1',
                'tour_handk' => '2021-01-21',
                'tour_ngaybd' => '2021-08-21',
                'tour_ngaykt' => '2021-08-23',
                'tour_chiphi' => '1900000',
                'tour_soluong' => '20',
                'gd_id' => '2',
                'tour_daily' => 'ivivu',
                'tour_hinhanh' => 'ivivu-hai-dang-nam-du.jpg',
                'tour_trangthai' => 1,
            ],
            [
                'lt_id' => '2',
                'tour_handk' => '2021-03-21',
                'tour_ngaybd' => '2021-03-22',
                'tour_ngaykt' => '2021-03-24',
                'tour_chiphi' => '1400000',
                'tour_soluong' => '20',
                'gd_id' => '2',
                'tour_daily' => 'ivivu',
                'tour_hinhanh' => 'ivivu-binh-ba.jpg',
                'tour_trangthai' => 1,
            ],
        ];
        DB::table('Tour')->insert($arr);
    }
}
