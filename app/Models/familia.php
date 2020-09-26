<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class familia
 * @package App\Models
 * @version May 20, 2020, 9:42 pm UTC
 *
 * @property integer fabricante
 * @property string familia
 */
class familia extends Model
{
    #use SoftDeletes;

    public $table = 'familias';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'fabricante',
        'familia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fabricante' => 'integer',
        'familia' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

     function lista_familias($filtro){
        return db::table('familias as c')
                ->join('catalogos as ca','ca.id','c.catalogo')
                ->join('tbl_fabricantes as f','f.id_fabricante','ca.fabricante')
                ->where('c.catalogo',$filtro->catalogo)
                ->selectraw('c.id, c.familia, ca.catalogo,f.fabricante,f.id_fabricante, c.catalogo as id_catalogo')
                ->get();
    }    
}
