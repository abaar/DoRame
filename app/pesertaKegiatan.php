<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesertaKegiatan extends Model
{
	public function user(){
		return $this->belongsTo('app\User', 'idUser');
	}

	public function kegiatan(){
		return $this->belongsTo('app\kegiatan', 'idKegiatan');
	}
    //
}
