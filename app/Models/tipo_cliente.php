<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tipo_cliente
 * @package App\Models
 * @version August 26, 2020, 7:35 pm UTC
 *
 * @property string tipo_cliente
 */
class tipo_cliente extends Model
{
    #use SoftDeletes;

    public $table = 'tipo_clientes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tipo_cliente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_cliente' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
