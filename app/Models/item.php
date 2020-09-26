<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class item
 * @package App\Models
 * @version June 1, 2020, 5:18 pm UTC
 *
 * @property int disenio
 * @property string item
 */
class item extends Model
{
   # use SoftDeletes;

    public $table = 'items';
    

    public $timestamps = false;


    public $fillable = [
        'disenio',
        'item'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'item' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function lista_items($filtro){
        return db::table('items as i')
                    ->join('disenios as d','d.id','i.disenio')
                    ->join('subcategorias as c','c.id','d.subcategoria')
                    ->join('categorias as ca','ca.id','c.categoria')
                    ->join('familias as f','f.id','ca.familia')
                    ->join('catalogos as cat','cat.id','f.catalogo')
                    ->join('tbl_fabricantes as fa','cat.fabricante','id_fabricante')
                    ->where('i.disenio',$filtro->disenio)
                    ->orderby('i.id')
                    ->selectraw('i.*, d.disenio as nom_disenio, d.subcategoria as idsubcategoria, c.subcategoria, c.categoria,ca.familia as id_familia, f.catalogo,fa.id_fabricante,ca.categoria as nom_categoria')
                    ->get();
    }
}
