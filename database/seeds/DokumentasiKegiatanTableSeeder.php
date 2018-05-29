<?php

use Illuminate\Database\Seeder;

class DokumentasiKegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\DokumentasiKegiatan::class,10)->create();
        //
    }
}
