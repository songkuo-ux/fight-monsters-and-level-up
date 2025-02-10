<?php

namespace App\Exceptions;

use App\Models\UserBusinessProducts;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     * 日志级别从低到高排序，代表了事件的严重程度：
     * emergency: 系统不可用，立即采取行动
     * alert: 必须立即处理的问题
     * critical: 严重错误，系统功能受到严重影响
     * error: 常规错误，通常是操作或请求的问题
     * warning: 警告，通常是预示着潜在问题
     * notice: 事件，通常不影响程序运行，但值得注意
     * info: 提供程序运行的详细信息，通常用于调试
     * debug: 低级别的信息，适用于开发和调试环境
     */

    protected $levels = [
        QueryException::class => 'critical',  // 数据库查询错误记录为 critical
        BusinessLogicException::class => 'warning', // 自定义业务逻辑错误记录为 warning
    ];
    //如果是用户发送的请求有问题，错误的请求不计入logs
    protected $dontReport = [
        APIHttpException::class,
    ];
    //$dontFlash 属性定义了一个数组，列出了在验证失败时，永远不应该被闪存到 session 中的字段。
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];
    //设置错误的格式
    protected array $format = [
        'message' => ':message',
        'errors' => ':errors',
        'code' => ':code',
        'status_code' => ':status_code',
        'debug' => ':debug',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
//    //目前只接受get，post请求
//    public function render($request, Throwable $e)
//    {
//        if ($e instanceof AuthorizationException) {
//            $e = new test1Exception('认证失败，请重新登录', $e);
//        }
//        $response = $this->genericResponse($e);
//        $headers = [
//            'Access-Control-Allow-Origin' => '*',
//            'Access-Control-Allow-Headers' => '*',
//            'Access-Control-Allow-Methods' => 'POST',
//        ];
//
//        $response->headers->add($headers);
//
//        return $response;
//    }
    protected function runningInDebugMode(): bool
    {
        return config('app.debug');
    }
}
