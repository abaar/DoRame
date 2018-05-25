<?php

namespace App\Http\Controllers;

use App\kegiatan;
use App\lokasi;
use App\lokasiKegiatan;
use DB;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\View;
class KegiatanController extends Controller
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
    public function show(kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(kegiatan $kegiatan)
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
    public function update(Request $request, kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(kegiatan $kegiatan)
    {
        //
    }

    public function search(request $request){
        $realdest=$request['destinasi'];
        $dest="%". (string)$request['destinasi'] ."%";
        $budget=(int)$request['budget'];
        $startdate=$request['startdate'];
        $enddate=$request['enddate'];

        $getKegiatans = DB::table('kegiatans')
            ->join('lokasi_kegiatans','kegiatans.id','=','lokasi_kegiatans.idKegiatan')
            ->join('lokasis','lokasi_kegiatans.idLokasi','=','lokasis.id')
            ->select('kegiatans.*' , 'lokasis.id','lokasis.nama as namalokasi')
            ->where('kegiatans.budget','<',$budget)
            ->where('lokasis.nama','LIKE',$dest)
            ->get();

        return view('searchpage',compact('getKegiatans','realdest'));
        
    }
}
