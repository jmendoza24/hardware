<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class proyectos_clientes
 * @package App\Models
 * @version July 6, 2020, 5:54 pm UTC
 *
 * @property integer id_proyecto
 * @property integer id_cliente
 * @property string comentario
 */
class proyectos_clientes extends Model
{

    public $table = 'proyectos_clientes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_proyecto',
        'id_cliente',
        'comentario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_proyecto' => 'integer',
        'id_cliente' => 'integer',
        'comentario' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
