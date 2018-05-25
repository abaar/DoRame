<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\pesertaKegiatan;
use App\kegiatan;
use App\lokasi;
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
    public function show(/*pesertaKegiatan $pesertaKegiatan*/)
    {
        $trips = DB::table('peserta_kegiatans')
            ->select('peserta_kegiatans.*')->where('peserta_kegiatans.idUser', '=', 13)
            ->join('kegiatans', 'kegiatans.id', '=', 'peserta_kegiatans.idKegiatan')
            ->join('users as lead', 'lead.id', '=', 'kegiatans.leader')
            ->join('users as guid', 'guid.id', '=', 'kegiatans.guide')
            ->join('lokasis', 'lokasis.id', '=', 'kegiatans.id')
            ->select('kegiatans.mulai', 'kegiatans.selesai', 'kegiatans.nama', 'lokasis.nama as lokasikegiatan', 'lead.namaDepan as leader', 'guid.namaDepan as guide')
            ->get();
//        $hehe = DB::table('peserta_kegiatans')->where('peserta_kegiatans.idUser', '=', 13);
        return view('profile.history', compact('trips'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pesertaKegiatan  $pesertaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(pesertaKegiatan $pesertaKegiatan)
    {

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
}
