<?php

namespace App\Utils\Repository\Contracts;

use Illuminate\Database\Eloquent\Builder;

/**
 * Interface Criteria
 * @package App\Utils\Repository\Contracts
 */
interface Criteria
{
    /**
     * @param Builder $builder
     * @return mixed
     */
    public function apply(Builder $builder);
}
