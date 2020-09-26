<?php

namespace App\Repositories;

use App\Models\formulas;
use App\Repositories\BaseRepository;

/**
 * Class formulasRepository
 * @package App\Repositories
 * @version June 3, 2020, 2:58 pm UTC
*/

class formulasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'compuesto',
        'formula'
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
        return formulas::class;
    }
}
