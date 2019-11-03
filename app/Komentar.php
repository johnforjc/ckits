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
}
