<?php

namespace App\Repositories;

use App\Models\Clientes;
use App\Repositories\BaseRepository;

/**
 * Class ClientesRepository
 * @package App\Repositories
 * @version October 29, 2019, 11:04 pm UTC
*/

class ClientesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'empresa',
        'telefono1',
        'telefono2',
        'correo',
        'direccion',
        'rfc',
        'pais',
        'estado',
        'municipio',
        'cp',
        'id_tipo1',
        'id_tipo2',
        'id_tipo3',
        'id_tipo4',
        'id_precio',
        'referencia',
        'activo',
        'dir_facturacion',
        'contacto',
        'fax'
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
        return Clientes::class;
    }
}
