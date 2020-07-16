<?php

use Illuminate\Database\Seeder;

class GiaiDoanSeeder extends Seeder
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
                'giai_doan' => '2019 - 2020',
                'gd_trangthai' => 1
            ],[
                'giai_doan' => '2020 - 2021',
                'gd_trangthai' => 1
            ]
        ];
        DB::table('GiaiDoan')->insert($arr);
    }
}
