<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
    	//parent::setUp();
  		$this->call(UserTableSeeder::class);
  		$this->call(KegiatanTableSeeder::class);
  		$this->call(LokasiTableSeeder::class);
  		$this->call(LokasiKegiatanTableSeeder::class);
  		$this->call(PesertaKegiatanTableSeeder::class);
  		$this->call(KomentarKegiatanTableSeeder::class);
  		$this->call(DokumentasiKegiatanTableSeeder::class);
  		$this->call(KomentarDokumentasiTableSeeder::class);
  		$this->call(KomentarLokasiTableSeeder::class);

  	}
}
