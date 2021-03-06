<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class productos
 * @package App\Models
 * @version May 18, 2020, 4:06 pm UTC
 *
 * @property integer fabricante
 * @property integer catalogo
 * @property string pagina
 * @property integer familia
 * @property integer categoria
 * @property integer subcategoria
 * @property integer disenio
 * @property string item
 * @property integer sufijo
 * @property string grupo_sufijo
 * @property string descripcion
 * @property string descripcion_mtk
 * @property string especificacion
 * @property string selector_mtk
 * @property string mortise
 * @property string fmm1
 * @property string stem
 * @property string fmm2
 * @property string handle
 * @property string fmm3
 * @property string wheel
 * @property string fastener
 * @property string style
 * @property string finish
 * @property string style_1
 * @property string style_2
 * @property string style_3
 * @property string latch
 * @property string strike
 * @property string cylinder
 * @property string keyling
 * @property string finish_det_1
 * @property string finish_det_2
 * @property string finish_det_3
 * @property string finish_det_4
 * @property integer dependencias
 * @property integer handing
 * @property string door_thickness
 * @property string backset
 * @property string costo_1
 * @property string costo_2
 * @property string costo_3
 * @property string costo_4
 * @property integer calculo_codigo
 * @property string codigo_sistema
 * @property string notas
 * @property string exterior_tim_dep_1
 * @property string exterior_tim_1_accion
 * @property string int_escutcheon_dep_2
 */
class productos extends Model
{
 #   use SoftDeletes;

    public $table = 'productos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'fabricante',
        'catalogo',
        'pagina',
        'familia',
        'categoria',
        'subcategoria',
        'disenio',
        'item',
        'info',
        'sufijo',
        'grupo_sufijo',
        'descripcion',
        'descripcion_mtk',
        'especificacion',
        'selector_mtk',
        'mortise',
        'fmm1',
        'stem',
        'fmm2',
        'handle',
        'fmm3',
        'wheel',
        'fastener',
        'style',
        'finish',
        'finish_int',
        'dt',
        'style_1',
        'style_2',
        'style_3',
        'latch',
        'strike',
        'cylinder',
        'keyling',
        'finish_det_1',
        'finish_det_2',
        'finish_det_3',
        'finish_det_4',
        'dependencias',
        'handing',
        'door_thickness',
        'backset',
        'costo_1',
        'costo_2',
        'costo_3',
        'costo_4',
        'calculo_codigo',
        'codigo_sistema',
        'notas',
        'exterior_tim_dep_1',
        'exterior_tim_1_accion',
        'int_escutcheon_dep_2',
        'int_escutcheon_dep2_accion',
        'knob_lever_dep3',
        'knob_lever_dep3_accion',
        'spindle_dep4',
        'spindle_dep4_accion',
        'cylinder_dep5',
        'cylinder_dep5_accion',
        'mortise_lock_dep6',
        'mortise_lock_dep6_accion',
        'blocking_dep7',
        'blocking_dep7_accion',
        'turn_knob8',
        'turn_knob8_accion',
        'dep9',
        'dep9_accion',
        'dep10_libre',
        'dep10_libre_accion',
        'dep11_libre',
        'dep11_libre_accion',
        'dep12_libre',
        'dep12_libre_accion',
        'dep_rossetes',
        'dep_rossetes_accion',
        'dep_latches',
        'dep_latches_accion',
        'dep_adaptor',
        'dep_adaptor_accion',
        'dep_spindle',
        'dep_spindle_accion',
        'dep_extension',
        'dep_extension_accion',
        'latch_ext'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fabricante' => 'integer',
        'catalogo' => 'integer',
        'pagina' => 'string',
        'familia' => 'integer',
        'categoria' => 'integer',
        'subcategoria' => 'integer',
        'disenio' => 'integer',
        'item' => 'string',
        'info'=>'integer',
        'sufijo' => 'string',
        'grupo_sufijo' => 'string',
        'descripcion' => 'string',
        'descripcion_mtk' => 'string',
        'especificacion' => 'string',
        'selector_mtk' => 'string',
        'mortise' => 'string',
        'fmm1' => 'string',
        'stem' => 'string',
        'fmm2' => 'string',
        'handle' => 'string',
        'fmm3' => 'string',
        'wheel' => 'string',
        'fastener' => 'string',
        'style' => 'string',
        'finish' => 'string',
        'finish_int'=>'string',
        'dt'=>'dt',
        'style_1' => 'string',
        'style_2' => 'string',
        'style_3' => 'string',
        'latch' => 'string',
        'strike' => 'string',
        'cylinder' => 'string',
        'keyling' => 'string',
        'finish_det_1' => 'string',
        'finish_det_2' => 'string',
        'finish_det_3' => 'string',
        'finish_det_4' => 'string',
        'dependencias' => 'integer',
        'handing' => 'integer',
        'door_thickness' => 'string',
        'backset' => 'string',
        'costo_1' => 'string',
        'costo_2' => 'string',
        'costo_3' => 'string',
        'costo_4' => 'string',
        'calculo_codigo' => 'integer',
        'codigo_sistema' => 'string',
        'notas' => 'string',
        'exterior_tim_dep_1' => 'string',
        'exterior_tim_1_accion' => 'integer',
        'int_escutcheon_dep_2' => 'string',
        'int_escutcheon_dep2_accion' => 'integer',
        'knob_lever_dep3' => 'string',
        'knob_lever_dep3_accion' => 'integer',
        'spindle_dep4' => 'string',
        'spindle_dep4_accion' => 'integer',
        'cylinder_dep5' => 'string',
        'cylinder_dep5_accion' => 'integer',
        'mortise_lock_dep6' => 'string',
        'mortise_lock_dep6_accion' => 'integer',
        'blocking_dep7' => 'string',
        'blocking_dep7_accion' => 'integer',
        'turn_knob8' => 'string',
        'turn_knob8_accion' => 'integer',
        'dep9' => 'string',
        'dep9_accion' => 'integer',
        'dep10_libre' => 'string',
        'dep10_libre_accion' => 'integer',
        'dep11_libre' => 'string',
        'dep11_libre_accion' => 'integer',
        'dep12_libre' => 'string',
        'dep12_libre_accion' => 'integer',
        'dep_rossetes' => 'string',
        'dep_rossetes_accion' => 'integer',
        'dep_latches' => 'string',
        'dep_latches_accion' => 'integer',
        'dep_adaptor' => 'string',
        'dep_adaptor_accion' => 'integer',
        'dep_spindle' => 'string',
        'dep_spindle_accion' => 'integer',
        'dep_extension' => 'string',
        'dep_extension_accion' => 'integer',
        'latch_ext'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    function lista_productos($filtros){
        
        return db::select("SELECT p.id,p.item, p.descripcion, f.abrev, p.sufijo, p.codigo_sistema, f.fabricante, c.catalogo, fa.familia, ca.categoria, s.subcategoria, p.pagina
                                FROM productos p
                                LEFT JOIN tbl_fabricantes f ON f.id_fabricante = p.fabricante
                                LEFT JOIN catalogos c ON c.id = p.catalogo
                                LEFT JOIN familias fa ON fa.id = p.familia
                                LEFT JOIN categorias ca ON ca.id = p.categoria
                                LEFT JOIN subcategorias s ON s.id = p.subcategoria
                                where p.fabricante = ".$filtros->fabricante."
                                limit ".$filtros->min.", ".$filtros->max);
    }
    
}
