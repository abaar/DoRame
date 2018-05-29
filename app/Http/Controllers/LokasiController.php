<?php

namespace App\Http\Controllers;

use App\lokasi;
use DB;
use App\komentarKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LokasiController extends Controller
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
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(lokasi $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lokasi $lokasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasi $lokasi)
    {
        //
    }

    public function showlokasikomen($id){
        $data=DB::table('lokasis')
        ->select('*')
        ->where('id','=',$id)
        ->get();

        $komentar= DB::table('komentar_lokasis')
            ->join('users','users.id','=','komentar_lokasis.idUser')
            ->select('users.id as uid','users.username','users.namaDepan','users.foto','komentar_lokasis.id as kid','komentar_lokasis.komentar','komentar_lokasis.created_at')
            ->Distinct()
            ->where('komentar_lokasis.idLokasi','=',$id)
            ->get();

        $jumlahkomentar=DB::table('komentar_lokasis')
            ->select(DB::raw('count(komentar) as total,idLokasi'))
            ->where('idLokasi',$id)
            ->groupBy('idLokasi')
            ->orderBy('created_at','DESC')
            ->get();
        $totalkunjungan=DB::table('lokasi_kegiatans')
            ->join('kegiatans','kegiatans.id','=','lokasi_kegiatans.idKegiatan')
            ->select(DB::raw('count(kegiatans.id) as total,lokasi_kegiatans.idLokasi'))
            ->where('lokasi_kegiatans.idLokasi','=',$id)
            ->where('status','=',2)
            ->groupBy('lokasi_kegiatans.idLokasi')
            ->get();

        if (Auth::check()){
            return view('lokasi.location',compact('jumlahkomentar','data','komentar','totalkunjungan'));
        }
        else{
            return view('lokasi.publocaiton',compact('jumlahkomentar','data','komentar','totalkunjungan'));
        }
    }
}
