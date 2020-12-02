<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Repository\OperatorDictionary;
use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Id
 * @package App\Utils\Repository\Criteria\Common
 */
final class Id implements Criteria, OperatorDictionary
{
    /**
     * @var int
     */
    private $id;

    /**
     * Id constructor.
     * @param int|CompareValue $id
     */
    public function __construct($id)
    {
        if (! $this->isValid($id)) {
            throw new \InvalidArgumentException('Id must be integer or CompareValue object');
        }

        $this->id = $id;
    }

    private function isValid($id): bool
    {
        return is_int($id) || $id instanceof CompareValue;
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     */
    public function apply(Builder $builder)
    {
        $id         = is_int($this->id) ? $this->id : $this->id->getValue();
        $operator   = is_int($this->id) ? self::OD_EQUAL : $this->id->getOperator();

        return $builder->where('id', $operator, $id);
    }
}
