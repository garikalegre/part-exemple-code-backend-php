<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\CriteriaValue;

final class CompareValue implements CriteriaValue
{
    private $value;

    private $operator;

    /**
     * ControlValue constructor.
     * @param $value
     * @param $operator
     */
    public function __construct($value, string $operator = '=')
    {
        $this->value = $value;
        $this->operator = $operator;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }
}
