<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Cinema_Seat",
 *      required={"seatNumber", "type", "cinema_halls_id"},
 *      @SWG\Property(
 *          property="seatNumber",
 *          description="seatNumber",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cinema_halls_id",
 *          description="cinema_halls_id",
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
class Cinema_Seat extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cinema_seats';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'seatNumber',
        'type',
        'cinema_halls_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'seatNumber' => 'integer',
        'type' => 'string',
        'cinema_halls_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'seatNumber' => 'required',
        'type' => 'required',
        'cinema_halls_id' => 'required'
    ];

    
}
