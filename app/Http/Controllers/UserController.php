<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Validator;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
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
        $rules=array(
            'username' => ['required','regex:/^[a-zA-Z0-9]+\Z/'],
            'namaDepan' => 'required',
            'namaBelakang' =>'required',
            'password' =>'required|min:8',
            'repassword' => 'required|
            same:password',
            'email' => 'required|email',
            'asalkota' => 'required');

       $messages =array(
        'required' =>'Kolom :attribute wajib diisi!',
        'username.regex' =>'Username hanya boleh terdiri dari Alphanumeric!',
        'password.min' => 'Password minimal 8 karakter!',
        'repassword.same' => 'Re-password tidak sama!'
        );

        $validator=Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) { 
            return redirect()->back()
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput();
        }

        if ($request->isMethod('post')){
            $data = new User();
            $data->username=$request->username;
            $data->namaDepan=$request->namaDepan;
            $data->namaBelakang=$request->namaBelakang;
            $data->password=bcrypt($request->password);
            $data->email=$request->email;
            $data->asalkota=$request->asalkota;

            try {
              $data->save();
              return "Daftar sukses";
            } catch (\Illuminate\Database\QueryException $e) {
                $msg = "Username / Email sudah terdaftar!";
                return view('regist',compact('msg'));
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
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
    public function update(Request $request)
    {
//        dd($request);
        $rules=array(
            'namaDepan' => 'required',
            'namaBelakang' =>'required',
            'asalkota' => 'required',
            'foto' => 'image|nullable|max:1999');
        $messages =array(
            'required' =>'Kolom :attribute wajib diisi!',
            'max' => 'Size foto melebihi batas 2MB'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
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

        $data = Auth::user();
        $data->namaDepan=$request->namaDepan;
        $data->namaBelakang=$request->namaBelakang;
        $data->asalkota=$request->asalkota;
        $data->foto = $fileNametoStore;
        $data->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dokumentasi_kegiatan  $dokumentasi_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function tripHistory(){
//        $idUser = Auth::user()->id;
        $trips = DB::table('peserta_kegiatans')
//            ->select('peserta_kegiatans.*')
            ->where('peserta_kegiatans.idUser', '=', 10)
            ->where('peserta_kegiatans.isVerified', '=', '1')
            ->join('kegiatans', 'kegiatans.id', '=', 'peserta_kegiatans.idKegiatan')
            ->join('users as lead', 'lead.id', '=', 'kegiatans.leader')
//            ->join('users as guid', 'guid.id', '=', 'kegiatans.guide')
            ->join('lokasis', 'lokasis.id', '=', 'kegiatans.id')
            ->select('kegiatans.id', 'kegiatans.mulai', 'kegiatans.selesai', 'kegiatans.nama', 'lokasis.nama as lokasikegiatan', 'lead.namaDepan as leader')
            ->get();
        return view('profile.history', compact('trips'));
    }

    public function updatePass(Request $request)
    {
        $rules=array(
            'newpass' =>'required|min:8',
            'repass' => 'required|same:newpass');

        $messages =array(
            'required' =>'Kolom :attribute wajib diisi!',
            'newpass.min' => 'Password minimal 8 karakter!',
            'repass.same' => 'Re-password tidak sama!'
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $data = Auth::user();
        if (Hash::check($request->curpass, $data->password)){
            $data->password=bcrypt($request->newpass);
            $data->save();
            return redirect()->back();
        }
        else return redirect()->back()->withErrors(['curpass' => ['Password tidak sama']]);
//        return back()->withErrors(['field_name' => ['Your custom message here.']]);
    }
}
