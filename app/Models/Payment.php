<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Payment",
 *      required={"amount", "time_stamp", "discount_coupon_id", "payment_method", "bookings_id"},
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="time_stamp",
 *          description="time_stamp",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="discount_coupon_id",
 *          description="discount_coupon_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="remort_transction_id",
 *          description="remort_transction_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="bookings_id",
 *          description="bookings_id",
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
class Payment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'payments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'amount',
        'time_stamp',
        'discount_coupon_id',
        'remort_transction_id',
        'payment_method',
        'bookings_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'time_stamp' => 'datetime',
        'discount_coupon_id' => 'integer',
        'remort_transction_id' => 'integer',
        'bookings_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'amount' => 'required',
        'time_stamp' => 'required',
        'discount_coupon_id' => 'required',
        'remort_transction_id' => 'payment_method enum("paymentMethod",["cash","Bank") enum',
        'payment_method' => 'required',
        'bookings_id' => 'required'
    ];

    
}
