<?php

namespace App\Repositories;

use App\Models\Cnima;
use App\Repositories\BaseRepository;

/**
 * Class CnimaRepository
 * @package App\Repositories
 * @version August 14, 2021, 4:17 am UTC
*/

class CnimaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'totalCnimaHall'
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
        return Cnima::class;
    }
}
