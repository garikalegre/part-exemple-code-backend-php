<?php

namespace App\Utils\Encoders\Contracts;

/**
 * Interface JsonEncoder
 * @package App\Utils\Encoders\Contracts
 */
interface JsonEncoder
{
    /**
     * @param array $data
     * @return string
     */
    public function encode(array $data): string;

    /**
     * @param string $string
     * @return array
     */
    public function decode(string $string): array;
}
