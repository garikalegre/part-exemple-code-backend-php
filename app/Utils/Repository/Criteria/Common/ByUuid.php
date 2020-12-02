<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use App\Utils\Repository\Contracts\Repository\OperatorDictionary;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Uuid
 * @package App\Utils\Repository\Criteria\Common
 */
final class ByUuid implements Criteria, OperatorDictionary
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * ByUuid constructor.
     * @param string $id
     */
    public function __construct($id)
    {
        $this->uuid = $id;
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     */
    public function apply(Builder $builder)
    {
        return $builder->whereUuid($this->uuid, 'uuid');
    }
}
