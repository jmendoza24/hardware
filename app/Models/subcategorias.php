<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class subcategorias
 * @package App\Models
 * @version May 20, 2020, 10:55 pm UTC
 *
 * @property integer fabricante
 * @property string subcategoria
 */
class subcategorias extends Model
{
    #use SoftDeletes;

    public $table = 'subcategorias';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'categoria',
        'subcategoria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categoria' => 'integer',
        'subcategoria' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    function lista_subcategorias($filtro){
        return db::table('subcategorias as c')
                    ->join('categorias as ca','ca.id','c.categoria')
                    ->join('familias as f','f.id','ca.familia')
                    ->join('catalogos as cat','cat.id','f.catalogo')
                    ->join('tbl_fabricantes as fa','cat.fabricante','id_fabricante')
                    ->where('c.categoria',$filtro->categoria)
                ->selectraw('c.id, c.subcategoria, c.categoria,ca.familia as id_familia, f.catalogo,fa.id_fabricante,ca.categoria as nom_categoria')
                ->get();
    }

    
}
