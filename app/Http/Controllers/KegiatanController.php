<?php

namespace App\Http\Controllers;

use App\kegiatan;
use App\lokasi;
use App\lokasiKegiatan;
use DB;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\View;
use Illuminate\Support\Facades\Auth;
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
            ->select('kegiatans.id as id' ,'kegiatans.nama','kegiatans.deskripsi','kegiatans.budget','kegiatans.mulai','kegiatans.selesai','kegiatans.needguide','kegiatans.public','kegiatans.foto')
            ->Distinct()
            ->where('kegiatans.budget','<',$budget)
            ->where('kegiatans.status','=',1)
            ->where('lokasis.nama','LIKE',$dest)
            ->where('kegiatans.mulai','>=',$startdate)
            ->where('kegiatans.selesai','<=',$enddate)
            ->orderBy('kegiatans.budget','ASC')
            ->get();

        $pesertas = DB::table('kegiatans')
            ->join('peserta_kegiatans','peserta_kegiatans.idKegiatan','=','kegiatans.id')
            ->join('users','users.id','=','peserta_kegiatans.idUser')
            ->join('lokasi_kegiatans','kegiatans.id','=','lokasi_kegiatans.idKegiatan')
            ->join('lokasis','lokasi_kegiatans.idLokasi','=','lokasis.id')
            ->select(DB::raw('count(peserta_kegiatans.idUser) as jumlah,kegiatans.id as id'))
            ->where('kegiatans.budget','<',$budget)
            ->where('lokasis.nama','LIKE',$dest)
            ->where('kegiatans.mulai','>=',$startdate)
            ->where('kegiatans.selesai','<=',$enddate)
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
            ->where('kegiatans.mulai','>=',$startdate)
            ->where('kegiatans.selesai','<=',$enddate)
            ->where('kegiatans.status','=',1)
            ->where('peserta_kegiatans.applyAsGuide','=',1)
            ->groupBy('kegiatans.id')
            ->get();
        $logedin='no';
        if (Auth::check()){
            $logedin=Auth::user()->id;
        }
        return view('searchpage',compact('getKegiatans','realdest','pesertas','guides','logedin'));
        
    }

    public function showpost($id){
        $kegiatans = DB::table('kegiatans')
            ->select('kegiatans.id as id' ,'kegiatans.nama','kegiatans.deskripsi','kegiatans.budget','kegiatans.mulai','kegiatans.selesai','kegiatans.documbyguide','kegiatans.negoable','kegiatans.leader','kegiatans.public','kegiatans.foto','kegiatans.needguide')
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

        $daftarpesertas = DB::table('peserta_kegiatans')
            ->select('idUser')
            ->where('idKegiatan','=',$id)
            ->get();

        if(Auth::check()){
            $logedin=Auth::user()->id;
            foreach ($daftarpesertas as $ygikut) {
                if ($ygikut->idUser == $logedin){
                    return view('post.postowner',compact('kegiatans','pesertas','guides','lokasis','logedin'));                    
                }
            }
            
            return view('post.postpublic',compact('kegiatans','pesertas','guides','lokasis','logedin'));
        }
        $logedin='no';
        return view('post.postpublic',compact('kegiatans','pesertas','guides','lokasis','logedin'));
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

    public function cancel($id){
        $detil=DB::table('kegiatans')
        ->select('kegiatans.leader')
        ->where('kegiatans.id','=',$id)
        ->get();

        if($detil[0]->id==Auth::user()->id){
            Kegiatan::where('id','=',$id)->delete();
            return redirect('/index');
        }
    }
    public function showhistory(){
        $data = DB::table('histories')
        ->join('kegiatans','kegiatans.id','=','histories.idKegiatan')
        ->select('*')->where('email_user','=',Auth::user()->email)->get();


        return view('profile.history',compact('data'));

    }
}
