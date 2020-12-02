<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

final class OrderByDesc implements Criteria
{
    private $column;

    /**
     * OrderByDesc constructor.
     * @param $column
     */
    public function __construct($column)
    {
        $this->column = $column;
    }

    public function apply(Builder $builder)
    {
        return $builder->orderBy($this->column, 'desc');
    }
}
