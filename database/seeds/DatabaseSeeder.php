<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(DonViSeeder::class);
        // $this->call(MucHoTroSeeder::class);
        $this->call(LoaiNhanVienSeeder::class);
        $this->call(ChucVuSeeder::class);
        $this->call(CongDoanVienSeeder::class);
        $this->call(LichTrinhSeeder::class);
        $this->call(GiaiDoanSeeder::class);
        $this->call(TourSeeder::class);
        $this->call(TinhTrangThuPhiSeeder::class);
        $this->call(DK_TourSeeder::class);
        $this->call(ThongTinNguoiDKSeeder::class);
    }
}
