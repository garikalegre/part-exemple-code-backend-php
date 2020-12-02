<?php

namespace App\Utils\Adapters\Container;

use App\Utils\Adapters\Container\Contracts\Container;

/**
 * Class LaravelContainer
 * @package App\Utils\Adapters\Container
 */
final class LaravelContainer implements Container
{
    /**
     * @param string $className
     * @param array $params
     * @return mixed
     * @throws \ReflectionException
     */
    public function resolve(string $className, array $params = [])
    {
        if (empty($params)) {
            return resolve($className);
        }

        return $this->resolveWithParams($className, $params);
    }

    /**
     * @param string $className
     * @param array $params
     * @return mixed
     * @throws \ReflectionException
     */
    private function resolveWithParams(string $className, array $params)
    {
        $reflector = new \ReflectionClass($className);

        if (! $reflector->isInstantiable()) {
            return $this->resolve($className);
        }

        $constructor = $reflector->getConstructor();

        if ($constructor === null) {
            return $this->resolve($className);
        }

        $newParams = [];
        $dependencies = $constructor->getParameters();
        foreach ($dependencies as $ind => $dependency) {
            if (! array_key_exists($ind, $params)) {
                break;
            }

            $newParams[$dependency->getName()] = $params[$ind];
        }

        return app()->make($className, $newParams);
    }
}
