<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * Class Sub_baldwin
 * @package App\Models
 * @version May 21, 2020, 8:08 pm UTC
 *
 * @property string subcatalogo
 * @property string selector
 */
class Sub_baldwin extends Model
{
    #use SoftDeletes;

    public $table = 'sub_baldwins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'subcatalogo',
        'selector'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'subcatalogo' => 'string',
        'selector' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    function lista_subbaldwin($fabricante){
        return db::table('sub_baldwins as s')
                ->where('s.fabricante',$fabricante)
                ->get();
    }

    
}
