<?php

namespace App\Http\Controllers;
use Illuminate\Process\Pool;
use Illuminate\Support\Facades\Process;
use App\Models\User;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Jobs\test1job;
use Illuminate\Http\Request;
use Illuminate\Process\Pipe;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Process;
//use Symfony\Component\Process\Process;
use function Laravel\Prompts\select;
use function Laravel\Prompts\table;

class test1Controller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function user_test(Request $request)
    {
        // laravel 框架 写简单路由; ORM；Command命令；异步任务；mysql redis
        // 查找
//        $testuser = User::all();
//        $testuser = User::find(2);
//        dd($testuser);
        //增加
//        $testuser = new User();
//        $testuser -> name = 'tom';
//        $testuser -> email = 'tom@gmail.com';
//        $testuser -> password = Hash::make('123456');
//        $testuser -> save();
//        dd($testuser);
//        // 改
//        $testuser = User::find(1);
//        $testuser->name = 'sk2';
//        $testuser->save();
//        dd($testuser);
//        // 删除
//        $testuser = User::find(2);
//        $testuser->delete();
//        dd(User::all());
        // Command命令；异步任务；mysql redis
//        $testuser_sk = Cache::rememberForever('testuser_sk', function () {
//            print 'not redis,go mysql';
//            return User::where('name','sk2')->first();
//        });
//        dd($testuser_sk);
        // Command命令；异步任务
//        $process = new Process(['php', storage_path('scripts/test1.php')]);
//        $process->setTimeout(120);  // 设置超时120秒
//
//        // 开始执行进程
//        $process->start();
//
//        // 实时输出进程的标准输出和错误输出
//        while ($process->isRunning()) {
//            // 输出最新的标准输出和错误输出
//            echo 'waiting';
//            sleep(1);  // 每秒检查一次进程状态
//        }
//
//        // 进程完成后，获取最终输出并停止
//        $output = $process->getOutput();
//        $errorOutput = $process->getErrorOutput();
//
//        // 打印输出
//        dd($output, $errorOutput);
        //使用线程池

        // 使用 Laravel Process 的 pool 功能来启动多个并行进程
        $pool = Process::pool(function (Pool $pool) {
            // 启动五个进程，每个进程运行 test1.php
            for ($i = 1; $i <= 5; $i++) {
                $pool->path(__DIR__) // 设置执行命令的路径（当前目录）
                ->command(['php', storage_path('scripts/test1.php')]); // 执行 PHP 脚本
            }
        })->start(function (string $type, string $output, int $key) {
            echo "进程 {$key} 输出：\n$type\n$output\n";
        });

        // 等待所有进程完成
        while ($pool->running()->isNotEmpty()) {
            echo "waiting...\n";
            sleep(1);
        }

        // 获取所有进程的最终结果
        $results = $pool->wait();  // 等待并返回所有进程的执行结果

        // 你可以在这里使用 $results 处理每个进程的最终输出
        dd($results);  // 输出进程的结果，便于调试
    }
    public function user_test2(Request $request, $id)
    {
        // rememberForever 永久缓存
        $user = Cache::rememberForever('user_' . $id, function () use ($id) {
            return DB::table('users')->where('id', $id)->first();
        });

        // 如果获取的用户数据为空，可以处理这个情况
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // 返回查询到的用户数据
        return response()->json($user);
    }

}
