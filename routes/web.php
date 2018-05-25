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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',function(){
	return view('index');
});

Route::get('/regist',function(){
	return view('regist');
});

Route::get('/search',function(){
	return view('searchpage');
});

Route::get('/myprofile/edit',function(){
    return view('profile.index');
});


//Route::get('/myprofile/password',function(){
//    return view('profile.password');
//});

Route::get('/myprofile/history', function (){
   return view('profile.history');

Route::get('/post/public',function(){
	return view('post.postpublic');
});

// Route::get('/post/user',function(){
// 	return view('post.postuser');
// });
//
//THIS ONE DELETED, but u shld see postaplicant-user.blade.php

Route::get('/post/discuss',function(){
	return view('post.postdiscuss');
});

Route::get('/post/applicant',function(){
	return view('post.postapplicant');
});

Route::get('/post/owner',function(){
	return view('post.postowner');
});

Route::get('/post/create',function(){
	return view('post.postcreate');
});

Route::get('/post/edit',function(){
	return view('post.postedit');
});

Route::get('/location',function(){
	return view('lokasi.location');
});