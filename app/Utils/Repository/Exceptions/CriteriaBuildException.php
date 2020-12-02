<?php

namespace App\Utils\Repository\Exceptions;

/**
 * Class CriteriaBuildException
 * @package App\Utils\Repository\Exceptions
 */
final class CriteriaBuildException extends \Exception
{
    /**
     * @param string $criteria
     * @param string|null $error
     * @return CriteriaBuildException
     */
    public static function cannotBuildCriteria(string $criteria, string $error = null)
    {
        return new self(
            sprintf('Cannot build criteria y given alias - %s. %s', $criteria, $error ?: '')
        );
    }
}
