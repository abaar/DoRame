<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Validator;
use Illuminate\Http\Request;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules=array(
            'username' => ['required','regex:/^[a-zA-Z0-9]+\Z/'],
            'namaDepan' => 'required',
            'namaBelakang' =>'required',
            'password' =>'required|min:8',
            'repassword' => 'required|
            same:password',
            'email' => 'required',
            'asalkota' => 'required');

       $messages =array(
        'required' =>'Kolom :attribute wajib diisi!',
        'username.regex' =>'Username hanya boleh terdiri dari Alphanumeric!',
        'password.min' => 'Password minimal 8 karakter!',
        'repassword.same' => 'Re-password tidak sama!'
        );

        $validator=Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) { 
            return redirect()->back()
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput();
        }

        if ($request->isMethod('post')){
            $data = new User();
            $data->username=$request->username;
            $data->namaDepan=$request->namaDepan;
            $data->namaBelakang=$request->namaBelakang;
            $data->password=bcrypt($request->password);
            $data->email=$request->email;
            $data->asalkota=$request->asalkota;

            try {
              $data->save();
              return "Daftar sukses";
            } catch (\Illuminate\Database\QueryException $e) {
                $msg = "Username / Email sudah terdaftar!";
                return view('regist',compact('msg'));
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(ser $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
