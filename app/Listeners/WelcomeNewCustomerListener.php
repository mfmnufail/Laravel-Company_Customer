<?php

namespace App\Listeners;

use App\Mail\WelcomNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCustomerListener implements ShouldQueue
{

    public function handle($event)
    {
        sleep(10);
        Mail::to($event-> customer->email)->send(new WelcomNewUserMail());
    }
}
