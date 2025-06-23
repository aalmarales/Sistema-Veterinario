<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use App\Mail\PetDetailsMail; 
use App\Models\User;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Para testear el envío de correos electrónicos desde la consola';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$user = User::find(1);

        //Mail::to($user->email)->send(new PetDetailsMail('Prueba del email'));
    }
}
