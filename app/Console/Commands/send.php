<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class send extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'end:email{user} {--queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('user');
        dd($name);
//        return $this->argument('user');
//        dd($this->argument('user'));
    }
}
