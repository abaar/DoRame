<?php

use Illuminate\Database\Seeder;

class KomentarKegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\KomentarKegiatan::class,1000)->create();
    }
}
