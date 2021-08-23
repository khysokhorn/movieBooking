<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Show",
 *      required={"date", "start_time", "endTime"},
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="start_time",
 *          description="start_time",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="endTime",
 *          description="endTime",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="cinema_halls_id",
 *          description="cinema_halls_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="movie_apps_id",
 *          description="movie_apps_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Show extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'shows';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'date',
        'start_time',
        'endTime',
        'cinema_halls_id',
        'movie_apps_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
        'start_time' => 'datetime',
        'endTime' => 'datetime',
        'cinema_halls_id' => 'integer',
        'movie_apps_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
        'start_time' => 'required',
        'endTime' => 'required'
    ];

    
}
