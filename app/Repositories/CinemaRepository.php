<?php

namespace App\Repositories;

use App\Models\Cinema;
use App\Repositories\BaseRepository;

/**
 * Class CinemaRepository
 * @package App\Repositories
 * @version August 14, 2021, 4:19 pm UTC
*/

class CinemaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'city_id'
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
        return Cinema::class;
    }
}
