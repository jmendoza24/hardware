<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class disenio
 * @package App\Models
 * @version May 21, 2020, 7:21 pm UTC
 *
 * @property integer fabricante
 * @property string disenio
 */
class cliente_participantes extends Model
{
#    use SoftDeletes;

    public $table = 'cliente_participantes';
    
    public $timestamps = false;
    //protected $dates = ['deleted_at'];




}
