<?php

namespace App\Repositories;

use App\Models\proyectos_files;
use App\Repositories\BaseRepository;

/**
 * Class proyectos_filesRepository
 * @package App\Repositories
 * @version July 6, 2020, 5:54 pm UTC
*/

class proyectos_filesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_proyecto',
        'tipo_file',
        'file',
        'nombre_firma',
        'comprador_firma',
        'tel_firma'
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
        return proyectos_files::class;
    }
}
