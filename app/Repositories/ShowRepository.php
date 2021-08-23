<?php

namespace App\Repositories;

use App\Models\Show;
use App\Repositories\BaseRepository;

/**
 * Class ShowRepository
 * @package App\Repositories
 * @version August 15, 2021, 7:07 am UTC
*/

class ShowRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'start_time',
        'endTime',
        'cinema_halls_id',
        'movie_apps_id'
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
        return Show::class;
    }
}
