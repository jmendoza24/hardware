<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class Fabricantes
 * @package App\Models
 * @version January 10, 2020, 9:09 pm UTC
 *
 * @property integer id_fabricante
 * @property string fabricante
 * @property string nombre_largo
 * @property string abrev
 * @property string descripcion
 * @property string datos_bancarios
 * @property string direccion
 * @property integer pais
 * @property string contacto
 * @property string condiciones
 * @property string correo
 * @property string correo_gen
 * @property string web
 * @property string telefono_dir
 * @property string telefono_gen
 * @property string telefono_fax
 * @property integer gama
 * @property integer modalidad
 * @property integer id_tipo3
 * @property integer id_tipo4
 * @property integer activo
 * @property string|\Carbon\Carbon fecha
 * @property integer cp
 * @property string estado
 */
class Fabricantes extends Model
{
#    use SoftDeletes;

    public $table = 'tbl_fabricantes';
    
    public $timestamps = false;

    protected $primaryKey = 'id_fabricante';
    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_fabricante',
        'fabricante',
        'nombre_largo',
        'abrev',
        'descripcion',
        'datos_bancarios',
        'direccion',
        'pais',
        'contacto',
        'condiciones',
        'correo',
        'correo_gen',
        'web',
        'telefono_dir',
        'telefono_gen',
        'telefono_fax',
        'gama',
        'modalidad',
        'id_tipo3',
        'id_tipo4',
        'activo',
        'fecha',
        'cp',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_fabricante' => 'integer',
        'fabricante' => 'string',
        'nombre_largo' => 'string',
        'abrev' => 'string',
        'descripcion' => 'string',
        'datos_bancarios' => 'string',
        'direccion' => 'string',
        'pais' => 'integer',
        'contacto' => 'string',
        'condiciones' => 'string',
        'correo' => 'string',
        'correo_gen' => 'string',
        'web' => 'string',
        'telefono_dir' => 'string',
        'telefono_gen' => 'string',
        'telefono_fax' => 'string',
        'gama' => 'integer',
        'modalidad' => 'integer',
        'id_tipo3' => 'integer',
        'id_tipo4' => 'integer',
        'activo' => 'integer',
        'fecha' => 'date',
        'cp' => 'integer',
        'estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    function lista_precios(){
        return db::table('fabricantes_costos as c')
                ->join('tbl_fabricantes as f','f.id_fabricante','c.id_fabricante')
                ->selectraw('c.*,fabricante')
                ->get();
    }

    
}
