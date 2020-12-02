<?php

namespace App\Utils\Repository\Contracts\Repository;

/**
 * Interface Chunkable
 * @package App\Domain\Common\Contracts\Repository
 */
interface Chunkable extends Query
{
    /**
     * @param callable $algorithm
     * @return mixed
     */
    public function setAlgorithm(callable $algorithm);

    /**
     * @return callable
     */
    public function getAlgorithm(): ?callable;

    /**
     * @param int|null $limit
     * @return mixed
     */
    public function setLimit(?int $limit);

    /**
     * @return int|null
     */
    public function getLimit(): ?int;
}
