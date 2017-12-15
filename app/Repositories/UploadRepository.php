<?php

namespace App\Repositories;

use App\Models\Upload;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UploadRepository
 * @package App\Repositories
 * @version December 12, 2017, 4:13 pm UTC
 *
 * @method Upload findWithoutFail($id, $columns = ['*'])
 * @method Upload find($id, $columns = ['*'])
 * @method Upload first($columns = ['*'])
*/
class UploadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Upload::class;
    }
}
