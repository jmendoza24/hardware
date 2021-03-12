<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Abatimientos extends Model
{
    protected $table = 'cotizacion_abatimiento';

    protected $fillable = ['id_cotizacion','puerta','valor'];
    public $timestamps = false;

}
