<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class sufijos
 * @package App\Models
 * @version May 27, 2020, 8:16 pm UTC
 *
 * @property integer catalogo
 * @property integer subcatalogo
 * @property string sufijo
 */
class sufijos extends Model
{
    #use SoftDeletes;

    public $table = 'sufijos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'catalogo',
        'subcatalogo',
        'sufijo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'catalogo' => 'integer',
        'subcatalogo' => 'integer',
        'sufijo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function lista_sufijos(){
        return db::table('sufijos as c')
                ->join('categorias as ca','ca.id','c.categoria')
                ->join('subcategorias as s','s.id','c.subcategoria')
                ->selectraw('c.sufijo, ca.categoria, s.subcategoria,c.id')
                ->get();
    }
    
}
