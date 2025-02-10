<?php

namespace App\Exceptions;

use Exception;

class test1Exception extends APIHttpException
{
    //
    protected $statusCode = 401;
    protected $message = '您的数据有误';
}
