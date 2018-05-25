<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    //

    public function kometarLokasi(){
		return $this->hasMany('App\komentarLokasi', 'idLokasi');
	}

	public function lokasiKegiatan(){
		return $this->hasMany('App\lokasiKegiatan', 'idLokasi');
	}	
}
