<?php

use Illuminate\Database\Seeder;

class AnhTourSeeder extends Seeder
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
                
            ],[

            ],

        ];


       DB::table('Anh_Tour')->insert($arr);
    }
}
