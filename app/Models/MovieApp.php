<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MovieApp
 * @package App\Models
 * @version August 14, 2021, 4:07 am UTC
 *
 * @property string $title
 * @property string $description
 * @property string $duration
 * @property string $releaseDate
 * @property string $country
 * @property string $genre
 */

/**
 * @SWG\Definition(
 *      definition="MovieApp",
 *      required={"name", "totalCnimaHall"},
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *         
 *      ),
 *      @SWG\Property(
 *          property="duration",
 *          description="duration",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="releaseDate",
 *          description="releaseDate",
 *          type="string",
 *          format="date-time"
 *      ),
 *  @SWG\Property(
 *          property="country",
 *          description="country",
 *          type="string"
 *      ) ,
 *  @SWG\Property(
 *          property="genre",
 *          description="genre",
 *          type="string"
 *      )
 * )
 */

class MovieApp extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'movie_apps';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'title',
        'description',
        'duration',
        'releaseDate',
        'country',
        'genre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'duration' => 'datetime',
        'releaseDate' => 'datetime',
        'country' => 'string',
        'genre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'duration' => 'required',
        'releaseDate' => 'required',
        'country' => 'required',
        'genre' => 'required'
    ];
}
