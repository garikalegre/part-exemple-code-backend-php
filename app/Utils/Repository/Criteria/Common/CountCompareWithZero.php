<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

final class CountCompareWithZero implements Criteria
{
    private $column;
    private $operator;

    /**
     * SelectMax constructor.
     * @param CompareValue $compareValue
     */
    public function __construct(CompareValue $compareValue)
    {
        $this->column = $compareValue->getValue();
        $this->operator = $compareValue->getOperator();
    }

    public function apply(Builder $builder)
    {
        return $builder->selectRaw("COUNT($this->column) $this->operator 0");
    }
}
