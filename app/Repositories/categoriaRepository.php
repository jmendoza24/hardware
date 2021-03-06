<?php

namespace App\Repositories;

use App\Models\categoria;
use App\Repositories\BaseRepository;

/**
 * Class categoriaRepository
 * @package App\Repositories
 * @version May 20, 2020, 10:27 pm UTC
*/

class categoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fabricante',
        'categoria',
        'abrev'
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
        return categoria::class;
    }
}
