<?php

namespace App\Http\Controllers;

use App\komentarlokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class KomentarLokasiController extends Controller
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
    public function store(Request $request,$id)
    {
        $data = new komentarLokasi();
        $data->komentar=$request->komentar;
        $data->idLokasi=$id;
        $data->idUser=Auth::user()->id;
        $data->save();

        return redirect('/lokasi/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\komentar_lokasi  $komentar_lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(komentar_lokasi $komentar_lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\komentar_lokasi  $komentar_lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(komentar_lokasi $komentar_lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\komentar_lokasi  $komentar_lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, komentar_lokasi $komentar_lokasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\komentar_lokasi  $komentar_lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(komentar_lokasi $komentar_lokasi)
    {
        //
    }

    public function deletekomentar($id){
        komentarLokasi::where('id','=',$id)->delete();
        return redirect()->back();
    }
}
