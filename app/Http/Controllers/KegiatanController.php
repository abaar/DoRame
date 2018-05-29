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
            ->select('kegiatans.id as id' ,'kegiatans.nama','kegiatans.deskripsi','kegiatans.budget','kegiatans.mulai','kegiatans.selesai','kegiatans.needguide','kegiatans.public')
            ->Distinct()
            ->where('kegiatans.budget','<',$budget)
            ->where('kegiatans.status','=',1)
            ->where('lokasis.nama','LIKE',$dest)
            ->get();

        $pesertas = DB::table('kegiatans')
            ->join('peserta_kegiatans','peserta_kegiatans.idKegiatan','=','kegiatans.id')
            ->join('users','users.id','=','peserta_kegiatans.idUser')
            ->join('lokasi_kegiatans','kegiatans.id','=','lokasi_kegiatans.idKegiatan')
            ->join('lokasis','lokasi_kegiatans.idLokasi','=','lokasis.id')
            ->select(DB::raw('count(peserta_kegiatans.idUser) as jumlah,kegiatans.id as id'))
            ->where('kegiatans.budget','<',$budget)
            ->where('lokasis.nama','LIKE',$dest)
            ->where('kegiatans.status','=',1)
            ->where('peserta_kegiatans.applyAsGuide','=',0)
            ->groupBy('kegiatans.id')
            ->get();
        
        $guides = DB::table('kegiatans')
            ->join('peserta_kegiatans','peserta_kegiatans.idKegiatan','=','kegiatans.id')
            ->join('users','users.id','=','peserta_kegiatans.idUser')
            ->join('lokasi_kegiatans','kegiatans.id','=','lokasi_kegiatans.idKegiatan')
            ->join('lokasis','lokasi_kegiatans.idLokasi','=','lokasis.id')
            ->select(DB::raw('count(peserta_kegiatans.idUser) as jumlah,kegiatans.id as id'))
            ->where('kegiatans.budget','<',$budget)
            ->where('lokasis.nama','LIKE',$dest)
            ->where('kegiatans.status','=',1)
            ->where('peserta_kegiatans.applyAsGuide','=',1)
            ->groupBy('kegiatans.id')
            ->get();
  
        return view('searchpage',compact('getKegiatans','realdest','pesertas','guides'));
        
    }

    public function showpost($id){
        $kegiatans = DB::table('kegiatans')
            ->select('kegiatans.id as id' ,'kegiatans.nama','kegiatans.deskripsi','kegiatans.budget','kegiatans.mulai','kegiatans.selesai','kegiatans.documbyguide','kegiatans.negoable')
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


        //var_dump($kegiatans);
        return view('post.postowner',compact('kegiatans','pesertas','guides','lokasis'));
    }

    public function editpost($id){
        $detil_kegiatans = DB::table('kegiatans')
            ->select('kegiatans.id','kegiatans.nama','kegiatans.mulai','kegiatans.selesai','kegiatans.budget','kegiatans.deskripsi')
            ->where('kegiatans.id','=',$id)
            ->get();

        $detil_lokasis = DB::table('lokasi_kegiatans')
            ->join('lokasis','lokasi_kegiatans.idLokasi','=','lokasis.id')
            ->select('lokasis.nama as nama','lokasis.id as id')
            ->where('lokasi_kegiatans.idKegiatan','=',$id)
            ->get();

        return view('post.postedit',compact('detil_kegiatans','detil_lokasis'));
    }
}
