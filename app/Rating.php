<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    // Table name
    protected $table = 'ratings';

    // Primary Key
    public $primaryKey = 'id_rating';

    // Timestamps
    public $timestamps = 'true';
}
