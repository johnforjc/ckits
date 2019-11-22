<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempatKos extends Model
{
    // Table name
    protected $table = 'tempat_kos';

    // Primary Key
    public $primaryKey = 'id_tempat_kos';

    // Timestamps
    public $timestamps = 'false';

    public function komentar(){
        return $this->hasMany('App\Komentar');
    }

    public function User(){
        return $this->belongTo('App\User');
    }
}
