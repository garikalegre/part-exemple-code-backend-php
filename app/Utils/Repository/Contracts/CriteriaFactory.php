<?php

namespace App\Utils\Repository\Contracts;

interface CriteriaFactory
{
    public function buildCriteria(string $alias, $value): Criteria;
}
