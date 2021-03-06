<?php

namespace App\Repositories;

use App\Models\productos;
use App\Repositories\BaseRepository;

/**
 * Class productosRepository
 * @package App\Repositories
 * @version May 18, 2020, 4:06 pm UTC
*/

class productosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return productos::class;
    }
}
