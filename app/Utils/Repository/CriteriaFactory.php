<?php

namespace App\Utils\Repository;

use App\Utils\Adapters\Config\Contracts\Config;
use App\Utils\Adapters\Container\Contracts\Container;
use App\Utils\Repository\Contracts\Criteria;
use App\Utils\Repository\Contracts\CriteriaFactory as Contract;
use App\Utils\Repository\Exceptions\CriteriaBuildException;

/**
 * Class CriteriaFactory
 * @package App\Utils\Repository
 */
abstract class CriteriaFactory implements Contract
{
    public const DEFAULT_CONTEXT = 'default';
    private const CONFIG_PATH = 'repository.criterias';

    /**
     * @var Config
     */
    private $config;

    /**
     * @var array
     */
    private $schema = [];
    /**
     * @var Container
     */
    private $container;

    /**
     * CriteriaFactory constructor.
     * @param Config $config
     * @param Container $container
     */
    public function __construct(Config $config, Container $container)
    {
        $this->config = $config;
        $this->container = $container;
        $this->configure();
    }

    private function configure()
    {
        $this->schema = $this->config->get(self::CONFIG_PATH, []);
    }

    /**
     * @param string $alias
     * @param $value
     * @return Criteria
     * @throws CriteriaBuildException
     */
    public function buildCriteria(string $alias, $value): Criteria
    {
        try {
            return $this->proceedBuilding($alias, $value);
        } catch (\Throwable $exception) {
            throw CriteriaBuildException::cannotBuildCriteria($alias, $exception->getMessage());
        }
    }

    /**
     * @param string $alias
     * @param $value
     * @return Criteria
     * @throws \ReflectionException
     */
    private function proceedBuilding(string $alias, $value): Criteria
    {
        $criteriaName = $this->getCriteriaName($alias);

        return $this->getInstance($criteriaName, $value);
    }

    /**
     * @param string $alias
     * @return string
     */
    private function getCriteriaName(string $alias): string
    {
        $list =  $this->getCriteriaList();

        return $list[$alias];
    }

    /**
     * @return array
     */
    private function getCriteriaList()
    {
        $context = $this->getContext();
        $list = $this->schema[$context] ?? [];

        return array_merge($list, $this->schema[self::DEFAULT_CONTEXT]);
    }

    /**
     * @return string
     */
    abstract protected function getContext();

    /**
     * @param string $className
     * @param $value
     * @return Criteria
     * @throws \ReflectionException
     */
    private function getInstance(string $className, $value): Criteria
    {
        return $this->container->resolve($className, [$value]);
    }
}
