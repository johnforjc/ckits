<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    public $primaryKey = 'id_pembayaran';

    public function tempatkos(){
        return $this->belongsTo('App\TempatKos');
    }
}
