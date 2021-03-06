<?php

namespace App\Utils\Repository\Queries\Common;

use App\Utils\Repository\Contracts\Repository\CriteriaDictionary;
use App\Utils\Repository\Contracts\Repository\Query;

/**
 * Class GetByUuid
 * @package App\Utils\Repository\Queries\Common
 */
class GetByUuidIn implements Query
{
    /**
     * @var array<string, mixed>
     */
    private $criteria;

    public function __construct(array $uuid)
    {
        $this->criteria = [
            CriteriaDictionary::BY_UUID => $uuid
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
