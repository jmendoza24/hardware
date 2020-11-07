<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tbl_oc_fab
 * @package App\Models
 * @version November 6, 2020, 3:25 am UTC
 *
 * @property integer $id_cotizacion
 * @property integer $estatus
 * @property integer $cantidad
 */
class tbl_oc_fab extends Model
{
    use SoftDeletes;

    public $table = 'tbl_oc_fabs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_cotizacion',
        'estatus',
        'cantidad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_cotizacion' => 'integer',
        'estatus' => 'integer',
        'cantidad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
