<?php

namespace App\Utils\Adapters\Config;

use App\Utils\Adapters\Config\Contracts\Config as Contract;
use Illuminate\Contracts\Config\Repository;

/**
 * Class Config
 * @package App\Utils\Adapters\Config
 */
final class Config implements Contract
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * Config constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $alias
     * @param null $default
     * @return mixed
     */
    public function get(string $alias, $default = null)
    {
        return $this->repository->get($alias, $default);
    }
}
