<?php

namespace App\Repositories;

use App\Models\tbl_fotos_productos;
use App\Repositories\BaseRepository;

/**
 * Class tbl_fotos_productosRepository
 * @package App\Repositories
 * @version September 29, 2020, 2:29 am UTC
*/

class tbl_fotos_productosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_producto',
        'foto',
        'activo',
        'tipo'
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
        return tbl_fotos_productos::class;
    }
}
