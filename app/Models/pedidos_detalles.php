<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class pedidos_detalles extends Model
{

    public $table = 'pedidos_detalles';
    public $timestamps = false;


    public $fillable = [
        'id_pedido',
        'tipo',
        'id_detalle',
        'cantidad',
        'lp'
    ];

    
}
