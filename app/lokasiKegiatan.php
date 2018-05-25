<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasiKegiatan extends Model
{
    //
    public function lokasi(){
		return $this->belongsTo('app\User', 'idUser');
	}

	public function kegiatan(){
		return $this->belongsTo('app\kegiatan', 'idKegiatan');
	}

	public $timestamps = false;
}
