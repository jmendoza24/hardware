<?php

namespace App\Repositories;

use App\Models\tipo_proyecto;
use App\Repositories\BaseRepository;

/**
 * Class tipo_proyectoRepository
 * @package App\Repositories
 * @version August 26, 2020, 7:37 pm UTC
*/

class tipo_proyectoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo_proyecto'
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
        return tipo_proyecto::class;
    }
}
