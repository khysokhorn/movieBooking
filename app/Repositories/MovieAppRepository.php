<?php

namespace App\Repositories;

use App\Models\MovieApp;
use App\Repositories\BaseRepository;

/**
 * Class MovieAppRepository
 * @package App\Repositories
 * @version August 14, 2021, 4:07 am UTC
*/

class MovieAppRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'duration',
        'releaseDate',
        'country',
        'genre'
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
        return MovieApp::class;
    }
}
