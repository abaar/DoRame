<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokumentasiKegiatan extends Model
{
    //

	public function user(){
		return $this->belongsTo('app\User', 'idUser');
	}

	public function kegiatan(){
		return $this->belongsTo('app\kegiatan', 'idKegiatan');
	}

	public function kometarDokumentasiKegiatan(){
		return $this->hasMany('App\komentarDokumentasiKegiatan', 'idDokumentasi');
	}

    public function fotoDokumentasi(){
        return $this->hasMany('App\fotoDokumentasi', 'idDokumentasi');
    }

}
