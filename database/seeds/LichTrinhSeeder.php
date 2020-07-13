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
                'lt_file' => 'LichTrinhVungTau.xlsx',
                'lt_trangthai' => 1
            ],[
                'lt_file' => 'LichTrinhCanTho.xlsx',
                'lt_trangthai' => 1
            ]
        ];
        DB::table('LichTrinh')->insert($arr);
    }
}