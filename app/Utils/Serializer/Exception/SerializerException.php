<?php

namespace App\Utils\Serializer\Exception;

/**
 * Class SerializerException
 * @package App\Utils\Serializer\Exception
 */
final class SerializerException extends \Exception
{
    /**
     * @param object $object
     * @param string|null $error
     * @return SerializerException
     */
    public static function cannotSerialize(object $object, string $error = null)
    {
        return new self(
            sprintf('Cannot serialize object -  %s. %s', get_class($object), $error ?: '')
        );
    }

    /**
     * @param string $className
     * @param string|null $error
     * @return SerializerException
     */
    public static function cannotDeserialize(string $className, string $error = null)
    {
        return new self(
            sprintf('Cannot deserialize object - %s. %s', $className, $error)
        );
    }
}
