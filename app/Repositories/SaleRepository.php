<?php

namespace App\Repositories;

use App\Models\Sale;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SaleRepository
 * @package App\Repositories
 * @version December 15, 2017, 1:52 am UTC
 *
 * @method Sale findWithoutFail($id, $columns = ['*'])
 * @method Sale find($id, $columns = ['*'])
 * @method Sale first($columns = ['*'])
*/
class SaleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'transaction_number',
        'amount',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sale::class;
    }
}
