<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tbl_fotos_productos
 * @package App\Models
 * @version September 29, 2020, 2:29 am UTC
 *
 * @property integer $id_producto
 * @property string $foto
 * @property integer $activo
 * @property integer $tipo
 */
class tbl_fotos_productos extends Model
{
    use SoftDeletes;

    public $table = 'tbl_fotos_productos';
    

    protected $dates = ['deleted_at'];
   


    public $fillable = [
        'id_producto',
        'foto',
        'activo',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_producto' => 'integer',
        'foto' => 'string',
        'activo' => 'integer',
        'tipo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
