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
                'ttndk_tuoi' => '20',
                'ttndk_cv' => 1,
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 1,
                'ttndk_ten' => 'Trần Văn B',
                'ttndk_gt' => 1,
                'ttndk_tuoi' => '20',
                'ttndk_cv' => 1,
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 2,
                'ttndk_ten' => 'Lê Văn A',
                'ttndk_gt' => 1,
                'ttndk_tuoi' => '20',
                'ttndk_cv' => 1,
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 2,
                'ttndk_ten' => 'Nguyễn Cung Đàn Bên Em',
                'ttndk_gt' => 0,
                'ttndk_tuoi' => '20',
                'ttndk_cv' => 1,
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 3,
                'ttndk_ten' => 'Trần Văn Đen Vâu',
                'ttndk_gt' => 1,
                'ttndk_tuoi' => '20',
                'ttndk_cv' => 1,
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 3,
                'ttndk_ten' => 'Nguyễn Văn Bin Dázch',
                'ttndk_gt' => 1,
                'ttndk_tuoi' => '20',
                'ttndk_cv' => 1,
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 4,
                'ttndk_ten' => 'Tô Li Vơ',
                'ttndk_gt' => 1,
                'ttndk_tuoi' => '20',
                'ttndk_cv' => 1,
                'ttndk_trangthai' => 1
            ],[
                'dkt_id' => 4,
                'ttndk_ten' => 'Su Bin',
                'ttndk_gt' => 0,
                'ttndk_tuoi' => '20',
                'ttndk_cv' => 1,
                'ttndk_trangthai' => 1
            ]
        ];
        DB::table('ThongTinNguoiDK')->insert($arr);
    }
}
