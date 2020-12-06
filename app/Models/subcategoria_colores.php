<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class familia
 * @package App\Models
 * @version May 20, 2020, 9:42 pm UTC
 *
 * @property integer fabricante
 * @property string familia
 */
class subcategoria_colores extends Model
{
    #use SoftDeletes;

    public $table = 'subcategoria_colores';
    
    public $timestamps = false;
  
}
