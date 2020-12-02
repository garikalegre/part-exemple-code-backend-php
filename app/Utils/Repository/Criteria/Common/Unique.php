<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Unique
 * @package App\Utils\Repository\Criteria\Common
 */
final class Unique implements Criteria
{
    /**
     * @var bool
     */
    private $isUnique;

    /**
     * Unique constructor.
     * @param bool $isUnique
     */
    public function __construct(bool $isUnique)
    {
        $this->isUnique = $isUnique;
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     */
    public function apply(Builder $builder)
    {
        return $this->isUnique ? $builder->distinct() : $builder;
    }
}
