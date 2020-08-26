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
                'tour_id' => 1,
                'at_hinhanh' => 'namdu1.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 1,
                'at_hinhanh' => 'namdu2.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 1,
                'at_hinhanh' => 'namdu3.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 1,
                'at_hinhanh' => 'namdu4.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 2,
                'at_hinhanh' => 'binhba1.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 2,
                'at_hinhanh' => 'binhba2.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 2,
                'at_hinhanh' => 'binhba3.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 2,
                'at_hinhanh' => 'binhba4.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 3,
                'at_hinhanh' => 'binhhung1.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 3,
                'at_hinhanh' => 'binhhung2.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 3,
                'at_hinhanh' => 'binhhung3.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 3,
                'at_hinhanh' => 'binhhung4.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 4,
                'at_hinhanh' => 'DN-1.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 4,
                'at_hinhanh' => 'DN-2.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 4,
                'at_hinhanh' => 'DN-3.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 4,
                'at_hinhanh' => 'DN-4.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 4,
                'at_hinhanh' => 'DN-5.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 5,
                'at_hinhanh' => 'hoian1.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 5,
                'at_hinhanh' => 'hoian2.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 5,
                'at_hinhanh' => 'hoian3.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 5,
                'at_hinhanh' => 'hoian4.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 6,
                'at_hinhanh' => 'DL-1.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 6,
                'at_hinhanh' => 'DL-2.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 6,
                'at_hinhanh' => 'DL-3.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 6,
                'at_hinhanh' => 'DL-4.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 6,
                'at_hinhanh' => 'DL-5.png',
                'at_trangthai' => 1
            ],[
                'tour_id' => 7,
                'at_hinhanh' => 'namdu1.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 7,
                'at_hinhanh' => 'namdu2.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 7,
                'at_hinhanh' => 'namdu3.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 7,
                'at_hinhanh' => 'namdu4.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 8,
                'at_hinhanh' => 'binhba1.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 8,
                'at_hinhanh' => 'binhba2.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 8,
                'at_hinhanh' => 'binhba3.jpg',
                'at_trangthai' => 1
            ],[
                'tour_id' => 8,
                'at_hinhanh' => 'binhba4.jpg',
                'at_trangthai' => 1
            ],
        ];
        DB::table('Anh_Tour')->insert($arr);
    }
}
