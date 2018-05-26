<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;

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
        if ($request->isMethod('post')){
            $data = new User();
            $data->username=$request->username;
            $data->namaDepan=$request->namaDepan;
            $data->namaBelakang=$request->namaBelakang;
            $data->password=$request->password;
            $data->email=$request->email;
            $data->asalkota=$request->asalkota;
            $data->save();
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
