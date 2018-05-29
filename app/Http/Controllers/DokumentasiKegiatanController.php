<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use App\dokumentasiKegiatan;
use App\fotoDokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DokumentasiKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = dokumentasiKegiatan::all();
//        $trips = DB::table('dokumentasi_kegiatans')
//            ->join('foto_dokumentasis', 'dokumentasi_kegiatans.id', '=', 'foto_dokumentasis.idDokumentasi')
//            ->limit(1)->get();
        return view('dokumentasi.index', compact('trips'));
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
            'title' => 'required',
            'story' =>'required',
            'kegiatan' => 'required',
            'foto' => 'image|nullable|max:1999');
        $messages =array(
            'required' =>'Kolom :attribute wajib diisi!',
            'max' => 'Size foto melebihi batas 2MB'
        );

//        $validator = Validator::make($request->all(), $rules, $messages);
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator);
//        }
        $data = new dokumentasiKegiatan();
        $data->idKegiatan = $request->kegiatan;
        $data->idUser = Auth::id();
        $data->judul = $request->title;
        $data->deskripsi = $request->story;
        $data->like = 0;
        $data->save();
        $kegiatan = DB::table('dokumentasi_kegiatans')->where('idKegiatan', '=', $request->kegiatan)->first();
        $files = $request->file('foto');
        $count = 1;
        foreach ($files as $file){
            $gambar = new fotoDokumentasi();
            $gambar->idDokumentasi = $kegiatan->id;
            $extension = $file->getClientOriginalExtension();
            $fileNametoStore = 'journey'.$kegiatan->id.'.'.$count.'.'.$extension;
            $path = $file->storeAs('public/img',$fileNametoStore);
            $count++;
            $gambar->foto = $fileNametoStore;
            $gambar->save();
        }
        return redirect('/journey');
    }

    public function dummy(Request $request)
    {
        $story = $request;
        return view('dokumentasi.dummy', compact('story'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(dokumentasiKegiatan $dokumentasiKegiatan)
    {
        return view('dokumentasi.show', compact('dokumentasiKegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(dokumentasiKegiatan $dokumentasiKegiatan)
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
    public function update(Request $request, dokumentasiKegiatan $dokumentasiKegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(dokumentasiKegiatan $dokumentasiKegiatan)
    {
        //
    }
}
