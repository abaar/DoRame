<?php

namespace App\Http\Controllers;

use App\pesertaKegiatan;
use DB;

use Illuminate\Http\Request;

class PesertaKegiatanController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pesertaKegiatan  $pesertaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(pesertaKegiatan $pesertaKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pesertaKegiatan  $pesertaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(pesertaKegiatan $pesertaKegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pesertaKegiatan  $pesertaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pesertaKegiatan $pesertaKegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pesertaKegiatan  $pesertaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesertaKegiatan $pesertaKegiatan)
    {
        //
    }

    public function showpeserta($id){
        $users=DB::table('peserta_kegiatans')
         ->join('users','users.id','=','peserta_kegiatans.idUser')
         ->select('peserta_kegiatans.*','users.namaDepan as nama')
         ->Distinct()
         ->where('peserta_kegiatans.idKegiatan','=',$id)
         ->get();
        
        $detil=DB::table('kegiatans')
            ->select('kegiatans.id','kegiatans.mulai','kegiatans.selesai','kegiatans.budget')
            ->where('kegiatans.id','=',$id)
            ->get();
         $pesertas = DB::table('kegiatans')
            ->join('peserta_kegiatans','peserta_kegiatans.idKegiatan','=','kegiatans.id')
            ->join('users','users.id','=','peserta_kegiatans.idUser')
            ->select(DB::raw('count(peserta_kegiatans.idUser) as jumlah,kegiatans.id as id'))
            ->where('kegiatans.id','=',$id)
            ->where('peserta_kegiatans.applyAsGuide','=',0)
            ->groupBy('kegiatans.id')
            ->get();
        
        $guides = DB::table('kegiatans')
            ->join('peserta_kegiatans','peserta_kegiatans.idKegiatan','=','kegiatans.id')
            ->join('users','users.id','=','peserta_kegiatans.idUser')    
            ->select(DB::raw('count(peserta_kegiatans.idUser) as jumlah,kegiatans.id as id'))
            ->where('kegiatans.id','=',$id)
            ->where('peserta_kegiatans.applyAsGuide','=',1)
            ->groupBy('kegiatans.id')
            ->get();
        
        $lokasis = DB::table('lokasi_kegiatans')
            ->join('lokasis','lokasi_kegiatans.idLokasi','=','lokasis.id')
            ->select('lokasis.nama as nama','lokasis.id as id')
            ->where('lokasi_kegiatans.idKegiatan','=',$id)
            ->get();
         return view('post.postapplicant',compact('users','detil','pesertas','guides','lokasis'));
    }
}
