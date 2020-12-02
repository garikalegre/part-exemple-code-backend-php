<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Offset
 * @package App\Utils\Repository\Criteria\Common
 */
final class Offset implements Criteria
{
    /**
     * @var int
     */
    private $offset;

    /**
     * Offset constructor.
     * @param int $offset
     */
    public function __construct(int $offset)
    {
        $this->offset = $offset;
    }

    /**
     * @param Builder $builder
     * @return Builder|mixed
     */
    public function apply(Builder $builder)
    {
        return $builder->offset($this->offset);
    }
}
