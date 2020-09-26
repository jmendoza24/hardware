<?php

namespace App\Repositories;

use App\Models\disenio;
use App\Repositories\BaseRepository;

/**
 * Class disenioRepository
 * @package App\Repositories
 * @version May 21, 2020, 7:21 pm UTC
*/

class disenioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fabricante',
        'disenio'
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
        return disenio::class;
    }
}
