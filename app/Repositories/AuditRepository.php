<?php

namespace App\Repositories;

use App\Models\Audit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AuditRepository
 * @package App\Repositories
 * @version December 18, 2017, 2:50 am WIB
 *
 * @method Audit findWithoutFail($id, $columns = ['*'])
 * @method Audit find($id, $columns = ['*'])
 * @method Audit first($columns = ['*'])
*/
class AuditRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'real_stock',
        'data_stock'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Audit::class;
    }
}
