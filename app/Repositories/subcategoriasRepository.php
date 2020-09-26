<?php

namespace App\Repositories;

use App\Models\subcategorias;
use App\Repositories\BaseRepository;

/**
 * Class subcategoriasRepository
 * @package App\Repositories
 * @version May 20, 2020, 10:55 pm UTC
*/

class subcategoriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categoria',
        'subcategoria'
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
        return subcategorias::class;
    }
}
