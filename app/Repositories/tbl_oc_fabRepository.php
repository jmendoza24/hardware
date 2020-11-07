<?php

namespace App\Repositories;

use App\Models\tbl_oc_fab;
use App\Repositories\BaseRepository;

/**
 * Class tbl_oc_fabRepository
 * @package App\Repositories
 * @version November 6, 2020, 3:25 am UTC
*/

class tbl_oc_fabRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_cotizacion',
        'estatus',
        'cantidad'
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
        return tbl_oc_fab::class;
    }
}
