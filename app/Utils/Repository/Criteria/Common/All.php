<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

final class All implements Criteria
{
    private $params = [];

    /**
     * All constructor.
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     */
    public function apply(Builder $builder)
    {
        return $builder->with($this->params);
    }
}
