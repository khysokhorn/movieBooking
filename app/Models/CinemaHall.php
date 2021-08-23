<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="CinemaHall",
 *      required={"name", "totalSeat"},
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="totalSeat",
 *          description="totalSeat",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="cinema_id",
 *          description="cinema_id",
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
class CinemaHall extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cinema_halls';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'totalSeat',
        'cinema_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'totalSeat' => 'integer',
        'cinema_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'totalSeat' => 'required'
    ];
}
