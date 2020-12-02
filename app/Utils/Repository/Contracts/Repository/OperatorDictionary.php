<?php

namespace App\Utils\Repository\Contracts\Repository;

interface OperatorDictionary
{
    public const OD_EQUAL = '=';
    public const OD_NOT_EQUAL = '!=';
    public const OD_GREATER = '>';
    public const OD_LESS = '<';
    public const OD_GREATER_EQUAL = '>=';
    public const OD_LESS_EQUAL = '<=';
    public const OD_IN = 'IN';
    public const OD_IS = 'IS';
    public const OD_IS_NOT = 'IS NOT';
    public const OD_NOT_IN = 'NOT IN';
    public const OD_LIKE = 'LIKE';
    public const OD_NOT_LIKE = 'NOT LIKE';
    public const OD_BETWEEN = 'BETWEEN';
}
