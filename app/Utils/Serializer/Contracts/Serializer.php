<?php

namespace App\Utils\Serializer\Contracts;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Interface Serializer
 * @package App\Utils\Serializer\Contracts
 */
interface Serializer
{
    /**
     * @param Arrayable $object
     * @return array
     */
    public function toArray(Arrayable $object): array;

    /**
     * @param string $className
     * @param array $params
     * @return object
     */
    public function fromArray(string $className, array $params): object;

    /**
     * @param Arrayable $object
     * @return string
     */
    public function toJson(Arrayable $object): string;

    /**
     * @param string $className
     * @param string $data
     * @return object
     */
    public function fromJson(string $className, string $data): object;
}
