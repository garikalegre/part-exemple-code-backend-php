<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class GroupBy
 * @package App\Utils\Repository\Criteria\Common
 */
final class GroupBy implements Criteria
{
    /**
     * @var
     */
    private $columns;

    /**
     * OrderByDesc constructor.
     * @param array $columns
     */
    public function __construct(...$columns)
    {
        $this->columns = $columns;
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     */
    public function apply(Builder $builder)
    {
        return $builder->groupBy($this->columns);
    }
}
