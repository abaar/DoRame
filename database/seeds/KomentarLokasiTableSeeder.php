<?php

use Illuminate\Database\Seeder;

class KomentarLokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\KomentarLokasi::class,200)->create();
    }
}
