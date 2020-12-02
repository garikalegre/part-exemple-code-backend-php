<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Limit
 * @package App\Utils\Repository\Criteria\Common
 */
final class Limit implements Criteria
{
    /**
     * @var int
     */
    private $limit;

    /**
     * Limit constructor.
     * @param int $limit
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     */
    public function apply(Builder $builder)
    {
        return $this->limit ? $builder->limit($this->limit) : $builder;
    }
}
