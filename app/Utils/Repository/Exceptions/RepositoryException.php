<?php

namespace App\Utils\Repository\Exceptions;

use Illuminate\Database\Eloquent\Model;

final class RepositoryException extends \Exception
{
    public static function invalidModel(Model $model)
    {
        return new self(
            sprintf('Invalid model given - %s', get_class($model))
        );
    }
}
