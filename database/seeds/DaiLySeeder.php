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
                'dl_ten' => 'Công Ty TNHH Thương Mại Dịch Vụ Du Lịch Mê Kông Xanh',
                'dl_trangthai' => 1
            ],[
                'dl_ten' => 'Công Ty CP Việt Tính',
                'dl_trangthai' => 1,
            ],[
                'dl_ten' => 'Tiền Giang - Công Ty Cổ Phần Du Lịch Tiền Giang',
                'dl_trangthai' => 1,
            ],[
                'dl_ten' => 'Sài Gòn - Mỹ Tho - Công Ty TNHH Thương Mại & Dịch Vụ Du Lịch Sài Gòn - Mỹ Tho',
                'dl_trangthai' => 1,
            ],[
                'dl_ten' => 'Việt Phong - Công Ty Cổ Phần Việt Phong Mekong',
                'dl_trangthai' => 1,
            ],[
                'dl_ten' => 'Chương Dương - Công Ty TNHH Chương Dương Tiền Giang',
                'dl_trangthai' => 1,
            ],[
                'dl_ten' => 'Trung Lương - Công Ty Cổ Phần Trung Lương',
                'dl_trangthai' => 1,
            ],[
                'dl_ten' => 'Mê Kông Mỹ Tho - Công Ty Cổ Phần Du Lịch Mê Kông Mỹ Tho',
                'dl_trangthai' => 1,
            ],[
                'dl_ten' => 'Trung Tâm Điều Hành Du Lịch Tiền Giang-Cty CP DL Tiền Giang',
                'dl_trangthai' => 1,
            ],[
                'dl_ten' => 'Trung Tâm Dịch Vụ Du Lịch Cái Bè-Cty Cổ Phần Thương Mại Dịch Vụ Cái Bè',
                'dl_trangthai' => 1,
            ]
        ];
        DB::table('DaiLy')->insert($arr);
        
    }
}
