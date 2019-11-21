<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    // Table name
    protected $table = 'komentars';

    // Primary Key
    public $primaryKey = 'id_komentar';

    // Timestamps
    public $timestamps = 'true';

    public function tempatkos(){
        return $this->belongsTo('App\TempatKos');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
