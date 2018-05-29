<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotoDokumentasi extends Model
{
    //
    public function dokumentasiKegiatan(){
		return $this->belongsTo('app\dokumentasiKegiatan', 'idDokumentasi');
	}

	

}
