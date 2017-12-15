<?php

namespace App\Repositories;

use App\Models\Purchase;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PurchaseRepository
 * @package App\Repositories
 * @version December 12, 2017, 3:04 pm UTC
 *
 * @method Purchase findWithoutFail($id, $columns = ['*'])
 * @method Purchase find($id, $columns = ['*'])
 * @method Purchase first($columns = ['*'])
*/
class PurchaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'ref',
        'amount',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Purchase::class;
    }
}
