<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

final class With implements Criteria
{
    private $value;

    /**
     * With constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function apply(Builder $builder)
    {
        return $builder->with($this->value);
    }
}
