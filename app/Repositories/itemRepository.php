<?php

namespace App\Repositories;

use App\Models\item;
use App\Repositories\BaseRepository;

/**
 * Class itemRepository
 * @package App\Repositories
 * @version June 1, 2020, 5:18 pm UTC
*/

class itemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'disenio',
        'item'
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
        return item::class;
    }
}
