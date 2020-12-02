<?php

namespace App\Utils\Bus;

use App\Utils\Adapters\Event\Contracts\Event;
use App\Services\Bus\EventBus as Bus;
use App\Utils\Bus\Exceptions\BusDispatcherException;

/**
 * Class EventBus
 * @package App\Utils\Adapters\Event
 */
final class EventBus implements Event, Bus
{
    /**
     * @param object $event
     * @return mixed|void
     * @throws BusDispatcherException
     */
    public function dispatch(object $event)
    {
        try {
            event($event);
        } catch (\Throwable $exception) {
            throw BusDispatcherException::cannotDispatchObject($event, $exception->getMessage());
        }
    }
}
