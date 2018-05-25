<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    //

    public function leader(){
		return $this->belongsTo('app\User', 'leader');
	}

	public function guide(){
		return $this->belongsTo('app\User', 'guide');
	}


	public function kometarKegiatan(){
		return $this->hasMany('App\komentarKegiatan', 'idKegiatan');
	}


	public function lokasiKegiatan(){
		return $this->hasMany('App\lokasiKegiatan', 'idKegiatan');
	}

	public function dokumentasiKegiatan(){
		return $this->hasMany('App\dokumentasiKegiatan', 'idKegiatan');
	}


	public function pesertaKegiatan(){
		return $this->hasMany('App\pesertaKegiatan', 'idKegiatan');
	}

}
