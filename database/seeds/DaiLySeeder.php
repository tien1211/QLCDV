<?php

use Illuminate\Database\Seeder;

class DaiLySeeder extends Seeder
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
                'cv_ten' => '',
                'cv_trangthai' => ''
            ],[
                'cv_ten' => '',
                'cv_trangthai' => ''
            ],[
                'cv_ten' => '',
                'cv_trangthai' => ''
            ],[
                'cv_ten' => '',
                'cv_trangthai' => ''
            ],[
                'cv_ten' => '',
                'cv_trangthai' => ''
            ],[
                'cv_ten' => '',
                'cv_trangthai' => ''
            ],[
                'cv_ten' => '',
                'cv_trangthai' => ''
            ],[
                'cv_ten' => '',
                'cv_trangthai' => ''
            ],[
                'cv_ten' => '',
                'cv_trangthai' => ''
            ],[
                'cv_ten' => '',
                'cv_trangthai' => ''
            ]
        ];
        DB::table('DaiLy')->insert($arr);
        
    }
}
