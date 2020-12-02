<?php

namespace App\Utils\Adapters\Event\Contracts;

/**
 * Interface Event
 * @package App\Utils\Adapters\Event\Contracts
 */
interface Event
{
    /**
     * @param object $event
     * @return mixed
     */
    public function dispatch(object $event);
}
