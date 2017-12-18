<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Stock
 * @package App\Models
 * @version December 17, 2017, 4:42 pm UTC
 *
 * @property string code
 * @property integer amount
 */
class Stock extends Model
{
    public $table = 'stocks';



    public $fillable = [
        'code',
        'amount',
        'created_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'amount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'amount' => 'required'
    ];

    
}
