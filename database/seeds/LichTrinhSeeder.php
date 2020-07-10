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
                'lt_file' => '',
                'cv_trangthai' => '',
            ],[
                'lt_file' => '',
                'cv_trangthai' => '',
            ],[
                'lt_file' => '',
                'cv_trangthai' => '',
            ],[
                'lt_file' => '',
                'cv_trangthai' => '',
            ],[
                'lt_file' => '',
                'cv_trangthai' => '',
            ],[
                'lt_file' => '',
                'cv_trangthai' => '',
            ]
        ];
        DB::table('LichTrinh')->insert($arr);
    }
}
