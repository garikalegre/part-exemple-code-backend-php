<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

final class SelectMax implements Criteria
{
    private $column;

    /**
     * SelectMax constructor.
     * @param $column
     */
    public function __construct($column)
    {
        $this->column = $column;
    }

    public function apply(Builder $builder)
    {
        return $builder->selectRaw(sprintf('MAX(%s)', $this->column));
    }
}
