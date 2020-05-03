<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a test company';

    public function handle()
    {
        $name= $this->ask('Company name: ');
            $phone = $this->ask("Company phone number: ");

            if ($this->confirm('Are you want add this '.$name.' company'))
        {

            $company = Company::create([

            'name'=> $name,
            'phone' => $phone
        ]);

            $this->info('Added '.$name);

        }else{$this->warn('No company added');}

    }
}
