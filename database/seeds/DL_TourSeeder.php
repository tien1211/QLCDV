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
                'dl_id' => '1',
                'tour_id' => '1'
            ],[
                'dl_id' => '2',
                'tour_id' => '2'
            ]
        ];
        DB::table('DL_Tour')->insert($arr);
        
    }
}
