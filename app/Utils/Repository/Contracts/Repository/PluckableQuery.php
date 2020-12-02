<?php

namespace App\Utils\Repository\Contracts\Repository;

/**
 * Interface PluckableQuery
 * @package App\Domain\Common\Contracts\Repository
 */
interface PluckableQuery
{
    /**
     * @param string $column
     * @return mixed
     */
    public function chooseColumn(string $column);

    /**
     * @return string|null
     */
    public function chosenColumn(): ?string;
}
