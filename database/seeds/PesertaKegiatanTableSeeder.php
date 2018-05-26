<?php

use Illuminate\Database\Seeder;

class PesertaKegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\PesertaKegiatan::class,1000)->create();
        //
    }
}
