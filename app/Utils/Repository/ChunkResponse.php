<?php

namespace App\Utils\Repository;

final class ChunkResponse
{
    /**
     * @var array
     */
    private static $response = [];

    private $responseParams;

    private function __construct(array $params)
    {
        $this->responseParams = $params;
    }

    private function __clone()
    {
    }

    public static function buildResponse()
    {
        return new self(self::$response);
    }

    public static function clear()
    {
        self::$response = [];
    }

    public function getResponse()
    {
        return $this->responseParams;
    }

    public static function addParam($params)
    {
        self::$response[] = $params;
    }
}
