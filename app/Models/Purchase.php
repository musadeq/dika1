<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Purchase
 * @package App\Models
 * @version December 12, 2017, 3:04 pm UTC
 *
 * @property string code
 * @property string ref
 * @property integer amount
 * @property integer total
 * @property integer upload_id
 */
class Purchase extends Model
{

    public $table = 'purchases';


    public $fillable = [
        'upload_id',
        'code',
        'ref',
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
        'ref' => 'string',
        'amount' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'upload_id' => 'require',
        'ref' => 'require',
        'amount' => 'require',
        'total' => 'require'
    ];

    
}
