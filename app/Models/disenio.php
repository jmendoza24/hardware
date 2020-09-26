<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class disenio
 * @package App\Models
 * @version May 21, 2020, 7:21 pm UTC
 *
 * @property integer fabricante
 * @property string disenio
 */
class disenio extends Model
{
#    use SoftDeletes;

    public $table = 'disenios';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'subcategoria',
        'disenio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'subcategoria' => 'integer',
        'disenio' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function lista_disenios($filtro){
        return db::table('disenios as d')
                    ->join('subcategorias as c','c.id','d.subcategoria')
                    ->join('categorias as ca','ca.id','c.categoria')
                    ->join('familias as f','f.id','ca.familia')
                    ->join('catalogos as cat','cat.id','f.catalogo')
                    ->join('tbl_fabricantes as fa','cat.fabricante','id_fabricante')
                    ->where('d.subcategoria',$filtro->subcategoria)
                ->selectraw('d.id, d.disenio, d.subcategoria as idsubcategoria, c.subcategoria, c.categoria,ca.familia as id_familia, f.catalogo,fa.id_fabricante,ca.categoria as nom_categoria')
                ->get();
    }

}
