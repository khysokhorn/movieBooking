<?php

namespace App\Repositories;

use App\Models\CinemaHall;
use App\Repositories\BaseRepository;

/**
 * Class CinemaHallRepository
 * @package App\Repositories
 * @version August 15, 2021, 3:19 am UTC
*/

class CinemaHallRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'totalSeat',
        'cinema_id'
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
        return CinemaHall::class;
    }
}
