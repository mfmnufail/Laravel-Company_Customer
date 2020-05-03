<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminViaSlack
{

    public function handle(NewCustomerHasRegisteredEvent $event)
    {
        dump('Stack message here');

    }
}
