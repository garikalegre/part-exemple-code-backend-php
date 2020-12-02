<?php

namespace App\Utils\Adapters\JobDispatcher\Contracts;

use App\Utils\Adapters\JobDispatcher\PendingDispatch;

interface JobDispatcher
{
    public function dispatch(string $queueableClass, array $args): PendingDispatch;
}
