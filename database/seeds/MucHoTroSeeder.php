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
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ],[
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ],[
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ],[
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ],[
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ],[
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ],[
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ],[
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ],[
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ],[
                'mht_nam' => '',
                'mht_phihotro' => '',
                'mht_trangthai' => ''
            ]
        ];
        DB::table('MucHoTro')->insert($arr);
    }
}
