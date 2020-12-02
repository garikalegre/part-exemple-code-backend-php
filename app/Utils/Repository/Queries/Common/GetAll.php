<?php

namespace App\Utils\Repository\Queries\Common;

use App\Utils\Repository\Contracts\Repository\CriteriaDictionary;
use App\Utils\Repository\Contracts\Repository\Query;

/**
 * Class GetAll
 * @package App\Utils\Repository\Queries\Common
 *
 */
class GetAll implements Query
{
    /**
     * @var array<string, mixed>
     */
    private $criteria;

    public function __construct()
    {
        $this->criteria = [
            CriteriaDictionary::ALL => []
        ];
    }

    /**
     * @return array|string[]
     */
    public function getCriteria(): array
    {
        return $this->criteria;
    }
}
