<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class proyectos_files
 * @package App\Models
 * @version July 6, 2020, 5:54 pm UTC
 *
 * @property integer id_proyecto
 * @property integer tipo_file
 * @property string file
 */
class proyectos_files extends Model{

    public $table = 'proyectos_files';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_proyecto',
        'tipo_file',
        'file',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_proyecto' => 'integer',
        'tipo_file' => 'integer',
        'file' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
