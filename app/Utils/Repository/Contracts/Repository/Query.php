<?php

namespace App\Utils\Repository\Contracts\Repository;

/**
 * Interface Query
 * @package App\Domain\Common\Contracts\Repository
 */
interface Query
{
    /**
     * @return array
     */
    public function getCriteria(): array;
}
