<?php

namespace App\Repositories;

use App\Models\proyectos_clientes;
use App\Repositories\BaseRepository;

/**
 * Class proyectos_clientesRepository
 * @package App\Repositories
 * @version July 6, 2020, 5:54 pm UTC
*/

class proyectos_clientesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_proyecto',
        'id_cliente',
        'comentario'
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
        return proyectos_clientes::class;
    }
}
