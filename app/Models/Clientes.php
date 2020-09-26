<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class Clientes
 * @package App\Models
 * @version October 29, 2019, 11:04 pm UTC
 *
 * @property integer id_cliente
 * @property string nombre
 * @property string empresa
 * @property string telefono1
 * @property string telefono2
 * @property string correo
 * @property string direccion
 * @property string rfc
 * @property integer pais
 * @property integer estado
 * @property integer municipio
 * @property string cp
 * @property integer id_tipo1
 * @property integer id_tipo2
 * @property integer id_tipo3
 * @property integer id_tipo4
 * @property integer id_precio
 * @property string referencia
 * @property integer activo
 * @property string dir_facturacion
 * @property string contacto
 * @property string fax
 */
class Clientes extends Model
{
//    use SoftDeletes;

    public $table = 'tbl_clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;
    
    

    public $fillable = [
        'nombre',
        'empresa',
        'telefono1',
        'telefono2',
        'correo',
        'direccion',
        'rfc',
        'pais',
        'estado',
        'municipio',
        'cp',
        'id_tipo1',
        'id_tipo2',
        'id_tipo3',
        'id_tipo4',
        'id_precio',
        'referencia',
        'activo',
        'dir_facturacion',
        'contacto',
        'fax',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'empresa' => 'string',
        'telefono1' => 'string',
        'telefono2' => 'string',
        'correo' => 'string',
        'direccion' => 'string',
        'rfc' => 'string',
        'pais' => 'integer',
        'estado' => 'integer',
        'municipio' => 'integer',
        'cp' => 'string',
        'id_tipo1' => 'integer',
        'id_tipo2' => 'integer',
        'id_tipo3' => 'integer',
        'id_tipo4' => 'integer',
        'id_precio' => 'integer',
        'referencia' => 'string',
        'activo' => 'integer',
        'dir_facturacion' => 'string',
        'contacto' => 'string',
        'fax' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function obtieneFabricantes($filtros){
        return db::table('tbl_relacion_clientes as rc')
                ->join('tbl_clientes as c','c.id_cliente','rc.id_clienterelacion')
                ->leftjoin('tbl_tipoproducto as tp','c.id_tipo1','tp.id_producto')
                ->where('rc.id_cliente',$filtros->id_cliente)
                ->selectraw('rc.id, rc.id_cliente as idcliente,  c.*, tp.tipo')
                ->get();
    }

    function inserta_asignado($filtros){

        $existe = db::table('tbl_relacion_clientes')
                    ->where([['id_clienterelacion',$filtros->cliente_id],['tiporelacion',1],['id_cliente',$filtros->id_cliente]])
                    ->count();

        if($existe>0){
            return 1;
        }else{
            db::table('tbl_relacion_clientes')
            ->insert(['id_cliente'=>$filtros->id_cliente,
                      'tiporelacion'=>1,
                      'id_clienterelacion'=>$filtros->cliente_id]);
            return 2;
        }
    }

    function elimina_asignado($filtros){
        db::table('tbl_relacion_clientes')
            ->where('id',$filtros->cliente_id)
            ->delete();
    }

    
}
