<?php

use Illuminate\Database\Seeder;

class LokasiKegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\LokasiKegiatan::class,100)->create();
        //
    }
}
