<?php

namespace App\Utils\Adapters\Container\Contracts;

/**
 * Interface Container
 * @package App\Utils\Adapters\Container\Contracts
 */
interface Container
{
    /**
     * @param string $className
     * @param array $params
     * @return mixed
     * @throws \ReflectionException
     */
    public function resolve(string $className, array $params = []);
}
