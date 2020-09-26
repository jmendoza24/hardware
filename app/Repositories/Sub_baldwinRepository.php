<?php

namespace App\Repositories;

use App\Models\Sub_baldwin;
use App\Repositories\BaseRepository;

/**
 * Class Sub_baldwinRepository
 * @package App\Repositories
 * @version May 21, 2020, 8:08 pm UTC
*/

class Sub_baldwinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subcatalogo',
        'selector'
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
        return Sub_baldwin::class;
    }
}
