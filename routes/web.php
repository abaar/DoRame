<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/index',function(){
        return view('index');
    });

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    Route::get('/regist',function(){
        return view('regist');
    });
});


Route::get('/search','KegiatanController@search');



//Start myprofile
Route::get('/myprofile/edit',function(){
    return view('profile.index');
});
Route::get('/myprofile/history', 'UserController@tripHistory');
Route::post('/myprofile/edit', 'UserController@update');
Route::post('/myprofile/edit/pass', 'UserController@updatePass');



Route::get('/post/create',function(){
	return view('post.postcreate');
});



Route::get('/lokasi/{id}',['uses'=>'LokasiController@showlokasikomen']);

Route::get('/post/{id}',['uses'=>'KegiatanController@showpost']);

Route::get('/post/edit/{id}',['uses' => 'KegiatanController@editpost']);

Route::get('/post/discuss/{id}',['uses'=>'KomentarKegiatanController@showdiscuss']);

Route::get('/post/user/{id}',['uses'=>'PesertaKegiatanController@showpeserta']);

Route::post('/regist/insert','UserController@store');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/{user}', 'UserController@show');


Route::get('/journey/create', function(){
    return view('dokumentasi.create');
});
Route::post('/journey/create/{kegiatan}', 'DokumentasiKegiatanController@store');

Route::get('/journey', 'DokumentasiKegiatanController@index');

Route::get('/post/{id}/regist/turis/{username}',['uses'=>'PesertaKegiatanController@daftarturis'])->middleware('auth');

Route::get('/post/{id}/regist/guide/{username}',['uses'=>'PesertaKegiatanController@daftarguide'])->middleware('auth');

Route::get('/post/{id}/batal/{user}',['uses'=>'PesertaKegiatanController@batalikut']);

Route::get('/post/cancel/{id}',['uses'=>'KegiatanController@cancel']);

Route::get('/post/discuss/delete/{iddis}',['uses'=>'KomentarKegiatanController@deletedis']);


Route::post('/post/{id}/discuss/insert',['uses'=>'KomentarKegiatanController@store']);

Route::post('/post/create/insert','KegiatanController@store');

Route::post('/post/edit/insert/{id}',['uses'=>'KegiatanController@update']);

Route::post('/lokasi/discuss/{id}',['uses'=>'KomentarLokasiController@store']);

Route::get('/lokasi/discuss/delete/{id}',['uses'=>'KomentarLokasiController@deletekomentar']);