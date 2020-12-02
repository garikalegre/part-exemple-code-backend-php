<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class OrderBy
 * @package App\Utils\Repository\Criteria\Common
 */
final class OrderBy implements Criteria
{
    /**
     * @var
     */
    private $column;

    /**
     * OrderByDesc constructor.
     * @param $column
     */
    public function __construct($column)
    {
        $this->column = $column;
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     */
    public function apply(Builder $builder)
    {
        return $builder->orderBy($this->column, 'asc');
    }
}
