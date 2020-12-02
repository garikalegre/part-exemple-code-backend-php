<?php

namespace App\Models\Repository;

use App\Utils\Repository\Contracts\Repository\CriteriaDictionary;

interface ExampleModelCriteriaDictionary  extends CriteriaDictionary
{
    public const BY_SOMETHING = 'some';
}