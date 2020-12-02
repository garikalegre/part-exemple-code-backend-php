<?php

namespace App\Utils\Repository\Criteria\Common\Objects;

use App\Utils\Repository\Contracts\Repository\OperatorDictionary;
use App\Utils\Repository\Contracts\CriteriaValue;
use Carbon\Carbon;

final class DateCompareValue implements CriteriaValue, OperatorDictionary
{
    private $value;

    private $operator;

    /**
     * DateCompareValue constructor.
     * @param Carbon $value
     * @param string $operator
     */
    public function __construct(Carbon $value, string $operator = self::OD_EQUAL)
    {
        $this->value = $value;
        $this->operator = $operator;
    }

    /**
     * @return Carbon
     */
    public function getValue(): Carbon
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
