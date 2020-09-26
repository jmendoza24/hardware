<?php

namespace App\Repositories;

use App\Models\familia;
use App\Repositories\BaseRepository;

/**
 * Class familiaRepository
 * @package App\Repositories
 * @version May 20, 2020, 9:42 pm UTC
*/

class familiaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fabricante',
        'familia'
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
        return familia::class;
    }
}
