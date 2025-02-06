<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test{userid=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'select * from users where id=userid';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('userid');
        Cache::rememberForever('test_user_information'.$id, function() use ($id) {
            return DB::table('users')->where('id', $id)->get();
        });
    }
}
