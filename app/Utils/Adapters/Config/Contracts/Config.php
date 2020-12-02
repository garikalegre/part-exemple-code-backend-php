<?php

namespace App\Utils\Adapters\Config\Contracts;

/**
 * Interface Config
 * @package App\Utils\Adapters\Config\Contracts
 */
interface Config
{
    /**
     * @param string $alias
     * @param $default
     * @return mixed
     */
    public function get(string $alias, $default = null);
}
