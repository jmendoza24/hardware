<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class categoria
 * @package App\Models
 * @version May 20, 2020, 10:27 pm UTC
 *
 * @property integer fabricante
 * @property string categoria
 */
class categoria extends Model
{
   #use SoftDeletes;

    public $table = 'categorias';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'fabricante',
        'categoria',
        'abrev'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fabricante' => 'integer',
        'categoria' => 'string',
        'abrev' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function lista_categorias($filtro){
         return db::table('categorias as c')
                ->join('familias as f','f.id','c.familia')
                ->join('catalogos as ca','ca.id','f.catalogo')
                ->join('tbl_fabricantes as fa','ca.fabricante','id_fabricante')
                ->where('c.familia',$filtro->familia)
                ->selectraw('c.id, c.abrev, c.categoria, f.familia,f.catalogo,fa.id_fabricante,f.id as id_familia')
                ->get();
    }
    
}
