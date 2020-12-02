<?php

namespace App\Utils\Serializer;

use App\Utils\Adapters\Container\Contracts\Container;
use App\Utils\Encoders\Contracts\JsonEncoder;
use App\Utils\Serializer\Contracts\Serializer as Contract;
use App\Utils\Serializer\Exception\SerializerException;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Serializer
 * @package App\Utils\Serializer
 */
final class Serializer implements Contract
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var JsonEncoder
     */
    private $encoder;

    /**
     * Serializer constructor.
     * @param Container $container
     * @param JsonEncoder $encoder
     */
    public function __construct(Container $container, JsonEncoder $encoder)
    {
        $this->container = $container;
        $this->encoder = $encoder;
    }

    /**
     * @param Arrayable $object
     * @return array
     */
    public function toArray(Arrayable $object): array
    {
        return $object->toArray();
    }

    /**
     * @param string $className
     * @param array $params
     * @return object
     * @throws SerializerException
     */
    public function fromArray(string $className, array $params): object
    {
        try {
            return $this->proceedSerialization($className, $params);
        } catch (\Throwable $exception) {
            throw SerializerException::cannotDeserialize($className, $exception->getMessage());
        }
    }

    /**
     * @param string $className
     * @param array $params
     * @return object
     */
    private function proceedSerialization(string $className, array $params)
    {
        $object = $this->getInstance($className);
        foreach ($params as $method => $value) {
            $setter = $this->generateMethod($method);
            if (method_exists($object, $setter)) {
                $object->{$setter}($value);
            }
        }

        return $object;
    }

    private function generateMethod(string $method)
    {
        $methodParts = explode('_', $method);
        $result = [];
        foreach ($methodParts as $part) {
            $result[] = ucfirst($part);
        }
        $method = implode('', $result);

        return sprintf('set%s', ucfirst($method));
    }

    /**
     * @param string $className
     * @return object
     */
    private function getInstance(string $className): object
    {
        return $this->container->resolve($className);
    }

    /**
     * @param Arrayable $object
     * @return string
     */
    public function toJson(Arrayable $object): string
    {
        $data = $object->toArray();

        return $this->encoder->encode($data);
    }

    /**
     * @param string $className
     * @param string $data
     * @return object
     * @throws SerializerException
     */
    public function fromJson(string $className, string $data): object
    {
        $params = $this->encoder->decode($data);

        return $this->fromArray($className, $params);
    }
}
