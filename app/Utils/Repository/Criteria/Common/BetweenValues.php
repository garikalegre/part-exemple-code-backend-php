<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\CriteriaValue;
use InvalidArgumentException;

final class BetweenValues implements CriteriaValue
{
    private const DEFAULT_OPERATOR = '=';

    /**
     * @var CompareValue|float|int|string
     */
    private $fromValue;
    /**
     * @var CompareValue|float|int|string
     */
    private $toValue;

    /**
     * ControlValue constructor.
     * @param string|integer|float|CompareValue $fromValue
     * @param string|integer|float|CompareValue $toValue
     */
    public function __construct($fromValue, $toValue)
    {
        if ($this->validate($fromValue)) {
            $this->fromValue = $fromValue;
        }

        if ($this->validate($toValue)) {
            $this->toValue = $toValue;
        }
    }

    /**
     * @param $value
     * @return bool
     */
    private function validate($value): bool
    {
        if (! is_scalar($value)
            && ! $value instanceof CompareValue
        ) {
            throw new InvalidArgumentException(
                'Given value should be string, integer, float or CompareValue object'
            );
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getFromValue()
    {
        return $this->getValue($this->fromValue);
    }

    /**
     * @return mixed
     */
    public function getFromOperator()
    {
        return $this->getOperator($this->fromValue);
    }

    /**
     * @return mixed
     */
    public function getToValue()
    {
        return $this->getValue($this->toValue);
    }

    /**
     * @return mixed
     */
    public function getToOperator()
    {
        return $this->getOperator($this->toValue);
    }

    /**
     * @param $value
     * @return mixed
     */
    private function getValue($value)
    {
        return $value instanceof CompareValue
            ? $value->getValue()
            : $value;
    }

    /**
     * @param $value
     * @return string
     */
    private function getOperator($value): string
    {
        return $value instanceof CompareValue
            ? $value->getOperator()
            : self::DEFAULT_OPERATOR;
    }
}
