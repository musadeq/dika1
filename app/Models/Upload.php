<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Upload
 * @package App\Models
 * @version December 12, 2017, 4:13 pm UTC
 *
 * @property string name
 * @property string category
 * @property integer imported
 * @property integer user_id
 */
class Upload extends Model
{

    public $table = 'uploads';


    public $fillable = [
        'filename',
        'category',
        'imported',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'imported' => 'integer',
        'filename' => 'string',
        'category' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'name' => 'required',
//        'type' => 'required'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
