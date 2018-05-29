<?php

namespace App\Http\Controllers;

use App\kegiatan;
use App\lokasi;
use App\lokasiKegiatan;
use App\pesertakegiatan;
use DB;
use Validator;
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

        $rules=array(
            'judul' => 'required',
            'deskripsi' => 'required|min:20',
            'budget' =>'required|integer',
            'startdate' =>'required|date',
            'enddate' => 'required|date|after_or_equal:startdate',
            'lokasi' => 'required'
        );

       $messages =array(
        'deskripsi.min'=> ':attribute minimal 20 Kata!',
        'budget.integer' => ':attribute harus berupa angka!',
        'required' =>'Kolom :attribute wajib diisi!',
        'startdate.required' => 'Kolom Berangkat Wajib di isi!',
        'enddate.required' =>'Kolom Berkahir wajib diisi!',
        'enddate.after_or_equal' =>'Tanggal berakhir harus lebih atau sama dengan Tanggal berangkat!'
        );

        $validator=Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) { 
            return redirect()->back()
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput();
        }

       if(!Auth::check()){
            return redirect('/login');
        }
        $data=new kegiatan();
        $data->nama = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->budget = $request->budget;
        if ($request->publicstatus == 1){
            $data->public = 1;
            $data->needguide=1;
        }
        else if ($request->publicstatus == 2){
            $data->public=1;
            $data->needguide=0;
        }
        else{
            $data->public=0;
            $data->needguide=1;
        }
        $data->foto=null;
        $data->mulai=$request->startdate;
        $data->selesai=$request->enddate;
        $data->leader = Auth::user()->id;
        if ($request->documbyguide!=null){
        $data->documbyguide=1;
        }
        else{$data->documbyguide=0;}
        $data->negoable=($request->negoable==null)?0:1;
        $data->status=0;
        $data->save();
        
        $mengikuti= new pesertakegiatan();
        $mengikuti->idUser=Auth::user()->id;
        $mengikuti->idKegiatan=$data->id;
        $mengikuti->applyAsGuide=2;
        $mengikuti->isVerified=1;
        $mengikuti->save();

        foreach ($request->lokasi as $halo) {
             $cek = DB::table('lokasis')
                ->select('id')
                ->where('nama','LIKE',$halo)
                ->get();
            if (count($cek)!=0){
                foreach($cek as $insertkebertempat){
                    $bertempat = new lokasiKegiatan();
                    $bertempat->idKegiatan=$data->id;
                    $bertempat->idLokasi = $insertkebertempat->id;
                    $bertempat->save();
                }
            }
            else{
                $lokasi = new lokasi();
                $lokasi->nama=$halo;
                $lokasi->deskripsi=$request->deskripsi;
                $lokasi->save();

                $bertempat = new lokasiKegiatan();
                $bertempat->idKegiatan=$data->id;
                $bertempat->idLokasi = $lokasi->id;
                $bertempat->save();
            }
        }

        return redirect('/post/'.$data->id);        
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
    public function update(Request $request, $id)
    {
        $rules=array(
            'judul' => 'required',
            'deskripsi' => 'required|min:20',
            'budget' =>'required|integer',
            'startdate' =>'required|date',
            'enddate' => 'required|date|after_or_equal:startdate'
        );

       $messages =array(
        'deskripsi.min'=> ':attribute minimal 20 Kata!',
        'budget.integer' => ':attribute harus berupa angka!',
        'required' =>'Kolom :attribute wajib diisi!',
        'startdate.required' => 'Kolom Berangkat Wajib di isi!',
        'enddate.required' =>'Kolom Berkahir wajib diisi!',
        'enddate.after_or_equal' =>'Tanggal berakhir harus lebih atau sama dengan Tanggal berangkat!'
        );

        $validator=Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) { 
            return redirect()->back()
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput();
        }
        $public=1;
        $needguide=1;
        if ($request->publicstatus==2){
            $needguide=0;
        }
        else if ($request->publicstatus==3){
            $public=0;
        }

        $docum=1;
        $nego=1;

        if($request->documbyguide==null){
            $docum=0;
        }
        if($request->negoable==null){
            $nego=0;
        }

        if ($request->hasFile('foto')){
            // get filename with ext
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('foto')->getClientOriginalExtension();
            //filename to store
            $fileNametoStore = 'user'.Auth::id().'.'.$extension;
            //upload image
            $path = $request->file('foto')->storeAs('public/img',$fileNametoStore);
        }else{
            $fileNametoStore = 'defaultava.jpg';
        }

        kegiatan::where('id','=',$id)->update(['nama'=>$request->judul,
            'budget'=>$request->budget,
            'deskripsi'=>$request->deskripsi,
            'public'=>$public,
            'needguide'=>$needguide,
            'mulai'=>$request->startdate,
            'selesai'=> $request->enddate,
            'documbyguide'=>$docum,
            'negoable'=>$nego
        ]);

        return redirect('/post/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(kegiatan $kegiatan)
    {
        
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
            ->select('kegiatans.id','kegiatans.nama','kegiatans.mulai','kegiatans.selesai','kegiatans.budget','kegiatans.deskripsi','kegiatans.foto')
            ->where('kegiatans.id','=',$id)
            ->get();

        $detil_lokasis = DB::table('lokasi_kegiatans')
            ->join('lokasis','lokasi_kegiatans.idLokasi','=','lokasis.id')
            ->select('lokasis.nama as nama','lokasis.id as id')
            ->where('lokasi_kegiatans.idKegiatan','=',$id)
            ->get();

        $detil1=$detil_kegiatans[0]->nama;

        return view('post.postedit',compact('detil_kegiatans','detil_lokasis','detil1'));
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
