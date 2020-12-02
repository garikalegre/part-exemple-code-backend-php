<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

abstract class Where implements Criteria
{
    /**
     * @var int
     */
    private $value;

    /**
     * @var string
     */
    private $operator;

    /**
     * ByMonthlyCost constructor.
     * @param CompareValue $controlValue
     */
    public function __construct(CompareValue $controlValue)
    {
        $this->value = $controlValue->getValue();
        $this->operator = $controlValue->getOperator();
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     */
    public function apply(Builder $builder)
    {
        return $builder->where($this->getField(), $this->operator, $this->value);
    }

    abstract protected function getField(): string;
}
