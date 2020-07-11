<?php

use Illuminate\Database\Seeder;

class MucHoTroSeeder extends Seeder
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
                'mht_nam' => 'Dưới 1 năm',
                'mht_phihotro' => 500000,
                'mht_trangthai' => 1
            ],[
                'mht_nam' => '1 năm đến 3 năm',
                'mht_phihotro' => 1000000,
                'mht_trangthai' => 1
            ],[
                'mht_nam' => '3 đến 5 năm',
                'mht_phihotro' => 1200000,
                'mht_trangthai' => 1
            ],[
                'mht_nam' => 'trên 5 năm',
                'mht_phihotro' => 2000000,
                'mht_trangthai' => 1
            ]
        ];
        DB::table('MucHoTro')->insert($arr);
    }
}
