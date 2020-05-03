<?php

use App\Company;
use App\Customer;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('contact:company-cleaning', function ()
{
    $this->info('Cleaning');

    Company::whereDoesntHave('customers')
        ->get()
        ->each(function ($company)
        {
            $company->delete();

            $this->warn('Deleted company '.$company->name);
        });

})->describe('Cleans up unused companies');
