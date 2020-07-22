<?php

use Illuminate\Database\Seeder;

class AnhTourSeeder extends Seeder
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
                'lt_id' => 1,
                'at_hinhanh' => 'VT-1.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 1,
                'at_hinhanh' => 'VT-2.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 1,
                'at_hinhanh' => 'VT-3.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 1,
                'at_hinhanh' => 'VT-4.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 2,
                'at_hinhanh' => 'CT-1.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 2,
                'at_hinhanh' => 'CT-2.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 2,
                'at_hinhanh' => 'CT-3.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 2,
                'at_hinhanh' => 'CT-4.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 2,
                'at_hinhanh' => 'CT-5.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 3,
                'at_hinhanh' => 'DL-1.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 3,
                'at_hinhanh' => 'DL-2.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 3,
                'at_hinhanh' => 'DL-3.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 3,
                'at_hinhanh' => 'DL-4.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 3,
                'at_hinhanh' => 'DL-5.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 4,
                'at_hinhanh' => 'DN-1.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 4,
                'at_hinhanh' => 'DN-2.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 4,
                'at_hinhanh' => 'DN-3.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 4,
                'at_hinhanh' => 'DN-4.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 4,
                'at_hinhanh' => 'DN-5.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 5,
                'at_hinhanh' => 'NT-1.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 5,
                'at_hinhanh' => 'NT-2.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 5,
                'at_hinhanh' => 'NT-3.png',
                'at_trangthai' => 1
            ],[
                'lt_id' => 5,
                'at_hinhanh' => 'NT-4.png',
                'at_trangthai' => 1
            ]
        ];


       DB::table('Anh_Tour')->insert($arr);
    }
}
