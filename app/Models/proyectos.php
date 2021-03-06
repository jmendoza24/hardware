<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class proyectos
 * @package App\Models
 * @version July 6, 2020, 5:50 pm UTC
 *
 * @property string nombre
 * @property string nombre_corto
 * @property string direccion
 * @property string geolocalizacion
 * @property string rfc
 * @property string cp
 * @property integer municipio
 * @property integer estado
 * @property integer pais
 * @property string correo_due o
 * @property string telefono
 * @property string arquitecto_correo
 * @property string tel_arq
 * @property string comprador_correo
 * @property string tel_comprador
 * @property integer tipo
 * @property string comentarios
 * @property integer estatus
 */
class proyectos extends Model
{
    //use SoftDeletes;

    public $table = 'proyectos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'nombre_corto',
        'direccion',
        'geolocalizacion',
        'rfc',
        'cp',
        'municipio',
        'estado',
        'pais',
        'correo_duenio',
        'telefono',
        'arquitecto_correo',
        'tel_arq',
        'nombre_duenio',
        'nombre_arq',
        'nombre_comprador', 
        'comprador_correo',
        'tel_comprador',
        'nombre_firma',
        'comprador_firma',
        'tel_firma',
        'tipo',
        'comentarios',
        'estatus',
        'residente',
        'residente_correo',
        'residente_tel'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'nombre_corto' => 'string',
        'direccion' => 'string',
        'geolocalizacion' => 'string',
        'rfc' => 'string',
        'cp' => 'string',
        'municipio' => 'string',
        'estado' => 'string',
        'pais' => 'integer',
        'correo_duenio' => 'string',
        'nombre_duenio'=>'string',
        'nombre_arq'=>'string',
        'nombre_comprador'=>'string',
        'telefono' => 'string',
        'arquitecto_correo' => 'string',
        'tel_arq' => 'string',
        'comprador_correo' => 'string',
        'tel_comprador' => 'string',
        'tipo' => 'integer',
        'comentarios' => 'string',
        'estatus' => 'integer',
        'nombre_firma'=>'string',
        'comprador_firma'=>'string',
        'tel_firma'=>'string',
        'residente'=>'string',
        'residente_correo'=>'string',
        'residente_tel'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function lista_clientes($filtro){
        return db::table('proyectos_clientes as pc')
                    ->join('cliente_participantes as c','c.id','pc.id_cliente')
                    ->join('tbl_clientes as cli','cli.id_cliente','c.id_cliente')
                    ->where('pc.id_proyecto',$filtro->id_proyecto)
                    ->selectraw('c.*,pc.comentario, pc.id as id_cp, pc.id_proyecto, empresa')
                    ->orderby('pc.id')
                    ->get();

    }
}
