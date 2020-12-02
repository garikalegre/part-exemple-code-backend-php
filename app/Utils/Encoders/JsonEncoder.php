<?php

namespace App\Utils\Encoders;

use App\Utils\Encoders\Contracts\JsonEncoder as Contract;

/**
 * Class JsonEncoder
 * @package App\Utils\Encoders
 */
final class JsonEncoder implements Contract
{
    /**
     * @param array $data
     * @return string
     */
    public function encode(array $data): string
    {
        return json_encode($data, true);
    }

    /**
     * @param string $string
     * @return array
     */
    public function decode(string $string): array
    {
        return json_decode($string, true);
    }
}
