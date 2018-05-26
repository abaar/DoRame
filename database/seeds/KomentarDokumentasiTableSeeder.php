<?php

use Illuminate\Database\Seeder;

class KomentarDokumentasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	factory(App\KomentarDokumentasiKegiatan::class,200)->create();
    }
}
