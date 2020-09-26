<?php

namespace App\Repositories;

use App\Models\catalogos;
use App\Repositories\BaseRepository;

/**
 * Class catalogosRepository
 * @package App\Repositories
 * @version May 20, 2020, 3:06 pm UTC
*/

class catalogosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fabricante',
        'catalogo'
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
        return catalogos::class;
    }
}
