<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Audit
 * @package App\Models
 * @version December 18, 2017, 2:50 am WIB
 *
 * @property string code
 * @property integer real_stock
 * @property integer data_stock
 */
class Audit extends Model
{
    use SoftDeletes;

    public $table = 'audits';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'real_stock',
        'data_stock',
        'created_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'real_stock' => 'integer',
        'data_stock' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'real_stock' => 'required',
    ];

    
}
