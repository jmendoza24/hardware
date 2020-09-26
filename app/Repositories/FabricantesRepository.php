<?php

namespace App\Repositories;

use App\Models\Fabricantes;
use App\Repositories\BaseRepository;

/**
 * Class FabricantesRepository
 * @package App\Repositories
 * @version January 10, 2020, 9:09 pm UTC
*/

class FabricantesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_fabricante',
        'fabricante',
        'nombre_largo',
        'abrev',
        'descripcion',
        'datos_bancarios',
        'direccion',
        'pais',
        'contacto',
        'condiciones',
        'correo',
        'correo_gen',
        'web',
        'telefono_dir',
        'telefono_gen',
        'telefono_fax',
        'gama',
        'modalidad',
        'id_tipo3',
        'id_tipo4',
        'activo',
        'fecha',
        'cp',
        'estado'
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
        return Fabricantes::class;
    }
}
