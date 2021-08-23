<?php

namespace App\Repositories;

use App\Models\Cinema_Seat;
use App\Repositories\BaseRepository;

/**
 * Class Cinema_SeatRepository
 * @package App\Repositories
 * @version August 15, 2021, 6:21 am UTC
*/

class Cinema_SeatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'seatNumber',
        'type',
        'cinema_halls_id'
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
        return Cinema_Seat::class;
    }
}
