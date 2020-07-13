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
        $this->call(ToChucSeeder::class);
        $this->call(MucHoTroSeeder::class);
        $this->call(LoaiNhanVienSeeder::class);
        $this->call(ChucVuSeeder::class);
        $this->call(CongDoanVienSeeder::class);
        $this->call(TaiKhoanSeeder::class);
        $this->call(LichTrinhSeeder::class);
        $this->call(TourSeeder::class);
        $this->call(DaiLySeeder::class);
        $this->call(DL_TourSeeder::class);
        $this->call(DK_TourSeeder::class);
        $this->call(ThongTinNguoiDKSeeder::class);
    }
}
