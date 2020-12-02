<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class IsNull
 * @package App\Utils\Repository\Criteria\Common
 */
class IsNull implements Criteria
{
    /**
     * @var string[] $columns
     */
    private $columns;

    /**
     * IsNull constructor.
     * @param array $columns
     */
    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    /**
     * apply criterion to query
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        return $query->whereNull($this->columns);
    }
}
