<?php

use Illuminate\Database\Seeder;

class ThongTinNguoiDKSeeder extends Seeder
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
                'dkt_id' => 1,
                'ttndk_ten' => 'Lê Thị A',
                'ttndk_gt' => 0,
                'ttndk_sdt' => '0365478512',
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 1,
                'ttndk_ten' => 'Trần Văn B',
                'ttndk_gt' => 1,
                'ttndk_sdt' => '0321458962',
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 2,
                'ttndk_ten' => 'Lê Văn A',
                'ttndk_gt' => 1,
                'ttndk_sdt' => '0359631547',
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 2,
                'ttndk_ten' => 'Nguyễn Cung Đàn Bên Em',
                'ttndk_gt' => 0,
                'ttndk_sdt' => '0365214896',
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 3,
                'ttndk_ten' => 'Trần Văn Đen Vâu',
                'ttndk_gt' => 1,
                'ttndk_sdt' => '0369874526',
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 3,
                'ttndk_ten' => 'Nguyễn Văn Bin Dázch',
                'ttndk_gt' => 1,
                'ttndk_sdt' => '0369754128',
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 4,
                'ttndk_ten' => 'Tô Li Vơ',
                'ttndk_gt' => 1,
                'ttndk_sdt' => '0321458963',
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 4,
                'ttndk_ten' => 'Su Bin',
                'ttndk_gt' => 0,
                'ttndk_sdt' => '0321485632',
                'ttndk_trangthai' => 1
            ]
        ];
        DB::table('ThongTinNguoiDK')->insert($arr);
    }
}
