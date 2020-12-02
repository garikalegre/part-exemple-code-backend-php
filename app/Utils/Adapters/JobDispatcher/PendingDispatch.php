<?php

namespace App\Utils\Adapters\JobDispatcher;

use Illuminate\Foundation\Bus\PendingDispatch as PendingDisp;

final class PendingDispatch
{
    private PendingDisp $pendingDisp;

    public function __construct(PendingDisp $pendingDispatch)
    {
        $this->pendingDisp = $pendingDispatch;
    }

    public function onQueue(string $queue): PendingDispatch
    {
        $this->pendingDisp->onQueue($queue);

        return $this;
    }
}
