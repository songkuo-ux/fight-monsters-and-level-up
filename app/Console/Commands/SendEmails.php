<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails{user}';

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
        //$user = $this->argument('user');
        //dd($user);
//        $option = $this->option('queue');
//        dd($option);
//        return 0;
        $collum1 = ['name','id'];
        $collum2 = [
            ['sk','1'],
            ['s','2'],
            ['m','3']];
        $this->table($collum1,$collum2);
    }
}
