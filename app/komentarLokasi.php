<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentarLokasi extends Model
{
    //
    public function user(){
		return $this->belongsTo('app\User', 'idUser');
	}

	public function lokasi(){
		return $this->belongsTo('app\lokasi', 'idLokasi');
	}
}
