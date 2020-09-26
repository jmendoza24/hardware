<?php

namespace App\Repositories;

use App\Models\tipo_cliente;
use App\Repositories\BaseRepository;

/**
 * Class tipo_clienteRepository
 * @package App\Repositories
 * @version August 26, 2020, 7:35 pm UTC
*/

class tipo_clienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_cliente'
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
        return tipo_cliente::class;
    }
}
