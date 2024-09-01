<?php

namespace App\Console\Commands;

use Application\Customer\UseCases\GetCart;
use Illuminate\Console\Command;

class teste extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:teste';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(GetCart $getCart)
    {
        $d = $getCart->execute(1);
        dd($d);
    }
}
