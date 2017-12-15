<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sale
 * @package App\Models
 * @version December 15, 2017, 1:52 am UTC
 *
 * @property string code
 * @property string nik
 * @property integer transaction_number
 * @property integer amount
 * @property integer total
 */
class Sale extends Model
{
    public $table = 'sales';

    public $fillable = [
        'upload_id',
        'code',
        'nik',
        'transaction_number',
        'amount',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'upload_id' => 'integer',
        'code' => 'string',
        'nik' => 'string',
        'transaction_number' => 'string',
        'amount' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'upload_id' => 'required',
        'code' => 'required',
        'nik' => 'required',
        'transaction_number' => 'required',
        'amount' => 'required',
        'total' => 'required'
    ];

    
}
