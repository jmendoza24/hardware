<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tipo_proyecto
 * @package App\Models
 * @version August 26, 2020, 7:37 pm UTC
 *
 * @property string tipo_proyecto
 */
class tipo_proyecto extends Model
{
    use SoftDeletes;

    public $table = 'tipo_proyectos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tipo_proyecto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_proyecto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
