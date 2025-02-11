<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
/**
 * 创建command的两种方式：1.在app/console/Commands下面创建；以类的形式创建。$this->load(__DIR__.'/Commands');
 *                     2.在routes里面，在console里面创建，以闭包函数的形式。require base_path('routes/console.php');
 */
class CreateModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'php artisan make:models,without params';

    /**
     * Execute the console command.
     * 测试时使用，快速创建这些模型
     */
    public function handle()
    {
        $models = [
            'AuthModel',
            'Base',
            'CampusModel',
            'MarketActivityCampusModel',
            'MarketActivityModel',
            'RolesModel',
            'Schol',
            'Student',
            'StudentAdditions',
            'StudentCampus',
            'StudentExtra',
            'StudentsModel',
            'StudentTags',
            'Tags',
            'UserBusinessProducts',
            'UsersModel',
        ];
        foreach ($models as $model){
            \Artisan::call('make:model',['name'=>$model]);
        }
    }
}
