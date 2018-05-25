<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentarDokumentasiKegiatan extends Model
{
    //
    public function user(){
		return $this->belongsTo('app\User', 'idUser');
	}

	public function kegiatan(){
		return $this->belongsTo('app\dokumentasiKegiatan', 'idDokumentasi');
	}

}
