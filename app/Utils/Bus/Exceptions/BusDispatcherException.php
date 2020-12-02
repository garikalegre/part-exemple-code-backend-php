<?php

namespace App\Utils\Bus\Exceptions;

/**
 * Class BusDispatcherException
 * @package App\Utils\Bus\Exceptions
 */
class BusDispatcherException extends \Exception
{
    /**
     * @param object $object
     * @param string $errorMessage
     * @return BusDispatcherException
     */
    public static function cannotDispatchObject(object $object, string $errorMessage)
    {
        return new self(
            sprintf('Cannot dispatch given object. %s, %s', get_class($object), $errorMessage)
        );
    }

    /**
     * @return BusDispatcherException
     */
    public static function shouldObjectReturn()
    {
        return new self('Query bus should always return response. Use command bus in this case');
    }
}
