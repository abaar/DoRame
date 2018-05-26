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
        $userid = DB::table('users')->pluck('id')->toArray();
        $cost = array();
        for ($x = 100000; $x <= 1000000; $x+=1000)
        {
             $cost[] = $x;
        }

        $status=array();
        for($y=0; $y<=2; $y++)
        {
            $status[]=$y;
        }
	return[
            'nama' => $faker->catchPhrase,
            'deskripsi' => $faker->sentence,
            'leader' => $faker->randomElement($userid),
            'needguide'=>$faker->boolean,
            'documbyguide'=>$faker->boolean,
            'negoable'=>$faker->boolean,
            'public'=>$faker->boolean,
            'status' => $faker->randomElement($status),
            'budget' => $faker->randomElement($cost),
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

		$lokasiid = DB::table('lokasis')->pluck('id')->toArray();
        $kegiatanid = DB::table('kegiatans')->pluck('id')->toArray();
        
	return[
            "idLokasi" =>$faker->randomElement($lokasiid),
            "idKegiatan" => $faker->randomElement($kegiatanid),
            'mulai' =>date("Y-m-d H:i:s"),
            'selesai' =>date("Y-m-d H:i:s"),
	];
});

$factory->define(App\PesertaKegiatan::class, function (Faker $faker) {
		$userid = DB::table('users')->pluck('id')->toArray();
        $kegiatanid = DB::table('kegiatans')->pluck('id')->toArray();
	return[
            'idUser'=>$faker->randomElement($userid),
            'idKegiatan'=>$faker->randomElement($kegiatanid),
            'isVerified'=>$faker->boolean
	];
});

$factory->define(App\KomentarKegiatan::class, function (Faker $faker) {
		$userid = DB::table('users')->pluck('id')->toArray();
        $kegiatanid = DB::table('kegiatans')->pluck('id')->toArray();
	return[
            'idUser'=>$faker->randomElement($userid),
            'idKegiatan'=>$faker->randomElement($kegiatanid),
            'komentar' => $faker->sentence
	];
});

$factory->define(App\DokumentasiKegiatan::class, function (Faker $faker) {
		$userid = DB::table('users')->pluck('id')->toArray();
        $kegiatanid = DB::table('kegiatans')->pluck('id')->toArray();
	return[
            'idKegiatan' =>$faker->randomElement( $kegiatanid),
            'idUser' =>$faker->randomElement($userid),
            'judul' => $faker->catchPhrase,             
            'deskripsi'=>  $faker->realText,
            'like' => $faker->randomElement($userid)
	];
});


$factory->define(App\KomentarDokumentasiKegiatan::class, function (Faker $faker) {
	   $userid = DB::table('users')->pluck('id')->toArray();
       $dokumid = DB::table('dokumentasi_kegiatans')->pluck('id')->toArray();
    	
	return[
            'idUser' =>$faker->randomElement($userid),
            'idDokumentasi' =>$faker->randomElement($dokumid),
            'komentar' =>  $faker->sentence,
	];
});

$factory->define(App\KomentarLokasi::class, function (Faker $faker) {
	    $lokasiid = DB::table('lokasis')->pluck('id')->toArray();
        $userid = DB::table('users')->pluck('id')->toArray();
    return[
            'idLokasi'=>$faker->randomElement($lokasiid),
            'idUser'=>$faker->randomElement($userid),
            'komentar'=>$faker->sentence,
	];
});





