<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
    	'username' => $faker->userName,
        'namaDepan' => $faker->firstName,
        'namaBelakang' => $faker->lastName,
        'asalkota' => $faker->city,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Kegiatan::class, function (Faker $faker) {
		
		$array = array();
		for ($x = 1; $x <= 30; $x++)
		{
    	$array[] = $x;
		}
	return[
            'nama' => $faker->catchPhrase,
            'deskripsi' => $faker->sentence,
            'leader' => $faker->randomElement($array),
            'guide' => $faker->randomElement($array),
            'status' => 1,
            'budget' => 100000,
            'lokasikegiatan' => 0,
            'mulai' =>date("Y-m-d H:i:s"),
            'selesai' =>date("Y-m-d H:i:s")
	];
});

$factory->define(App\Lokasi::class, function (Faker $faker) {
	return[
            'nama' => $faker->city,
            'deskripsi' => $faker->sentence
	];
});

$factory->define(App\LokasiKegiatan::class, function (Faker $faker) {

		$array = array();
		for ($x = 1; $x <= 30; $x++)
		{
    	$array[] = $x;
		}

	return[
            "idLokasi" =>$faker->randomElement($array),
            "idKegiatan" => $faker->randomElement($array),
            'mulai' =>date("Y-m-d H:i:s"),
            'selesai' =>date("Y-m-d H:i:s"),
	];
});

$factory->define(App\PesertaKegiatan::class, function (Faker $faker) {
		$array = array();
		for ($x = 1; $x <= 30; $x++)
		{
    	$array[] = $x;
		}
	return[
            'idUser'=>$faker->randomElement($array),
            'idKegiatan'=>$faker->randomElement($array),
            'isVerified'=>$faker->boolean
	];
});

$factory->define(App\KomentarKegiatan::class, function (Faker $faker) {
		$array = array();
		for ($x = 1; $x <= 30; $x++)
		{
    	$array[] = $x;
		}
	return[
            'idUser'=>$faker->randomElement($array),
            'idKegiatan'=>$faker->randomElement($array),
            'komentar' => $faker->sentence
	];
});

$factory->define(App\DokumentasiKegiatan::class, function (Faker $faker) {
		$array = array();
		for ($x = 1; $x <= 30; $x++)
		{
    	$array[] = $x;
		}
	return[
            'idKegiatan' =>$faker->randomElement($array),
            'idUser' =>$faker->randomElement($array),
            'judul' => $faker->catchPhrase,             
            'deskripsi'=>  $faker->realText,
            'like' => $faker->randomElement($array)
	];
});


$factory->define(App\KomentarDokumentasiKegiatan::class, function (Faker $faker) {
		$array = array();
		for ($x = 1; $x <= 30; $x++)
		{
    	$array[] = $x;
		}
	return[
            'idUser' =>$faker->randomElement($array),
            'idDokumentasi' =>$faker->randomElement($array),
            'komentar' =>  $faker->sentence,
	];
});

$factory->define(App\KomentarLokasi::class, function (Faker $faker) {
		$array = array();
		for ($x = 1; $x <= 30; $x++)
		{
    	$array[] = $x;
		}
	return[
            'idLokasi'=>$faker->randomElement($array),
            'idUser'=>$faker->randomElement($array),
            'komentar'=>$faker->sentence,
	];
});





