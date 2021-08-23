<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Booking",
 *      required={"number_of_seat", "time_stamp", "status"},
 *      @SWG\Property(
 *          property="time_stamp",
 *          description="time_stamp",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="users_id",
 *          description="users_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="shows_id",
 *          description="shows_id",
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
class Booking extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bookings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'number_of_seat',
        'time_stamp',
        'status',
        'users_id',
        'shows_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'time_stamp' => 'datetime',
        'status' => 'string',
        'users_id' => 'integer',
        'users_id' => 'integer',
        'users_id' => 'integer',
        'shows_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number_of_seat' => 'required',
        'time_stamp' => 'required',
        'status' => 'required',
        'users_id' => 'users_id integer:unsigned:foreign,users,id selectTable:users:email,name,id'
    ];
}
