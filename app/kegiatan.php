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

}
