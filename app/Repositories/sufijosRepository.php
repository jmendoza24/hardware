<?php

namespace App\Repositories;

use App\Models\sufijos;
use App\Repositories\BaseRepository;

/**
 * Class sufijosRepository
 * @package App\Repositories
 * @version May 27, 2020, 8:16 pm UTC
*/

class sufijosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'catalogo',
        'subcatalogo',
        'sufijo'
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
        return sufijos::class;
    }
}
