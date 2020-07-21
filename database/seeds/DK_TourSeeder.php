<?php

use Illuminate\Database\Seeder;

class DK_TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr= [
            [
                'cdv_id' => 1,
                'tour_id'=> 1,
                'tttp_id' => 1,
                'dkt_soluong'=> 5
            ],[
                'cdv_id' => 2,
                'tour_id'=> 1,
                'tttp_id' => 1,
                'dkt_soluong'=> 3
            ],[
                'cdv_id' => 3,
                'tour_id'=> 2,
                'tttp_id' => 2,
                'dkt_soluong'=> 4
            ],[
                'cdv_id' => 4,
                'tour_id'=> 2,
                'tttp_id' => 2,
                'dkt_soluong'=> 10
            ]
        ];
        DB::table('DK_Tour')->insert($arr);

    }
}
