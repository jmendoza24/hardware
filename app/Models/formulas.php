<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class formulas
 * @package App\Models
 * @version June 3, 2020, 2:58 pm UTC
 *
 * @property string compuesto
 * @property string formula
 */
class formulas extends Model
{
    use SoftDeletes;

    public $table = 'formulas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'compuesto',
        'formula'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'compuesto' => 'string',
        'formula' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
