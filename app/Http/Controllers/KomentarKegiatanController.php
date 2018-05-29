<?php

namespace App\Http\Controllers;

use App\kegiatan;
use App\lokasi;
use App\lokasiKegiatan;
use App\komentarKegiatan;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class KomentarKegiatanController extends Controller
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
     * @param  \App\komentar_kegiatan  $komentar_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(komentar_kegiatan $komentar_kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\komentar_kegiatan  $komentar_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(komentar_kegiatan $komentar_kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\komentar_kegiatan  $komentar_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, komentar_kegiatan $komentar_kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\komentar_kegiatan  $komentar_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(komentar_kegiatan $komentar_kegiatan)
    {
        //
    }

    public function showdiscuss($id){
        $diskusis= DB::table('komentar_kegiatans')
            ->join('kegiatans','kegiatans.id','=','komentar_kegiatans.idKegiatan')
            ->join('users','users.id','=','komentar_kegiatans.idUser')
            ->select('users.namaDepan as nama','users.id as uid','users.foto','komentar_kegiatans.komentar','komentar_kegiatans.created_at as kapan','users.username','komentar_kegiatans.id as kid','kegiatans.foto')
            ->Distinct()
            ->where('komentar_kegiatans.idKegiatan','=',$id)
            ->get();

        $detil=DB::table('kegiatans')
            ->select('kegiatans.id','kegiatans.mulai','kegiatans.selesai','kegiatans.budget','kegiatans.nama','kegiatans.foto','kegiatans.public','kegiatans.needguide','kegiatans.leader')
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



        $pesertas2=DB::table('peserta_kegiatans')
            ->select('idUser','isVerified')
            ->where('idKegiatan','=',$id)
            ->get();

        if(Auth::check()){
            $logedin=Auth::user()->id;
            foreach ($pesertas2 as $ygikut) {
                if ($ygikut->idUser == $logedin and $ygikut->isVerified==1){
                    return view('post.postdiscuss',compact('diskusis','pesertas','guides','lokasis','logedin','detil'));              
                }
                else if($ygikut->idUser==$logedin and $ygikut->isVerified==0){
                    $notverified=1;
                    return view('post.postdiscuss',compact('diskusis','pesertas','guides','lokasis','logedin','detil','notverified'));
                }
            }
            return view('post.postpubdiscuss',compact('diskusis','pesertas','guides','lokasis','logedin','detil'));
        }
        $logedin='no';
        return view('post.postpubdiscuss',compact('diskusis','pesertas','guides','lokasis','detil','logedin'));

        return view('post.postdiscuss',compact('diskusis','pesertas','guides','lokasis','detil'));
    }
}
