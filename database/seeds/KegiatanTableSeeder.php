<?php

use Illuminate\Database\Seeder;

class KegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Kegiatan::class,20)->create();
        //
    }
}
