<?php

namespace App\Utils\Repository\Criteria\Common;

use App\Utils\Repository\Contracts\Criteria;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class WithCount
 * @package App\Utils\Repository\Criteria\Common
 */
final class WithCount implements Criteria
{
    /**
     * @var mixed
     */
    private $relation;

    /**
     * @var mixed|null
     */
    private $alias;

    /**
     * WithCount constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->relation = $params['relation'];
        $this->alias = $params['alias'] ?? null;
    }

    /**
     * @param Builder $builder
     * @return mixed|void
     */
    public function apply(Builder $builder)
    {
        return $builder->withCount(
            $this->alias ? sprintf('%s as %s', $this->relation, $this->alias) : $this->relation
        );
    }
}
