<?php

namespace App\Utils\Adapters\JobDispatcher;

use App\Utils\Adapters\JobDispatcher\Contracts\JobDispatcher as Contract;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobDispatcher implements Contract
{
    public function dispatch(string $queueableClass, array $args): PendingDispatch
    {
        if (! $this->isSatisfy($queueableClass)) {
            throw new \InvalidArgumentException(sprintf(
                '%s is not implement %s or dispatch method doesn\'t exist',
                $queueableClass,
                ShouldQueue::class
            ));
        }

        return new PendingDispatch($queueableClass::dispatch(...$args));
    }

    private function isSatisfy(string $queueableClass): bool
    {
        $interfaces = class_implements($queueableClass);
        return $interfaces
            && in_array(ShouldQueue::class, $interfaces, true)
            && method_exists($queueableClass, 'dispatch');
    }
}
