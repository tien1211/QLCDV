<?php

use Illuminate\Database\Seeder;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'cv_ten' => 'Chủ Tịch',
                'cv_trangthai' => 1
            ],[
                'cv_ten' => 'Phó Chủ Tịch',
                'cv_trangthai' => 1

            ],[
                'cv_ten' => 'Trưởng Ban Tổ Chức',
                'cv_trangthai' => 1

            ],[
                'cv_ten' => 'Chủ Nhiệm Uy Ban Kiểm Tra',
                'cv_trangthai' => 1

            ],[
                'cv_ten' => 'Ủy Viên Ban Thường Vụ',
                'cv_trangthai' => 1

            ]
        ];
        DB::table('ChucVu')->insert($arr);
        
    }
}
