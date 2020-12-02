<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use App\Utils\Repository\Exceptions\CriteriaBuildException;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Select
 * @package App\Utils\Repository\Criteria\Common
 */
final class Select implements Criteria
{
    /**
     * @var
     */
    private $column;

    /**
     * Select constructor.
     * @param $column
     */
    public function __construct($column)
    {
        $this->column = $column;
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     * @throws CriteriaBuildException
     */
    public function apply(Builder $builder)
    {
        if (! is_string($this->column) && ! array($this->column)) {
            throw CriteriaBuildException::cannotBuildCriteria(get_class($this), 'Invalid params');
        }
        return is_array($this->column)
            ? $builder->select(...$this->column)
            : $builder->select($this->column);
    }
}
