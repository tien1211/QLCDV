<?php

use Illuminate\Database\Seeder;

class DL_TourSeeder extends Seeder
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
                'dl_id' => '',
                'tour_id' => ''
            ],[
                'dl_id' => '',
                'tour_id' => ''
            ],[
                'dl_id' => '',
                'tour_id' => ''
            ],[
                'dl_id' => '',
                'tour_id' => ''
            ],[
                'dl_id' => '',
                'tour_id' => ''
            ],[
                'dl_id' => '',
                'tour_id' => ''
            ],[
                'dl_id' => '',
                'tour_id' => ''
            ],[
                'dl_id' => '',
                'tour_id' => ''
            ],[
                'dl_id' => '',
                'tour_id' => ''
            ],[
                'dl_id' => '',
                'tour_id' => ''
            ]
        ];
        DB::table('DL_Tour')->insert($arr);
        
    }
}
