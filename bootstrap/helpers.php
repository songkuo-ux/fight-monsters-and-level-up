<?php
function api_response($status = 200, $data = [], $message = 'success')
{
    $now = microtime(true);
    $data = [
        'status_code' => 200,
        'data' => $data,
        'meta' => [
            'message' => $message,
            'code' => 0,
            'timestamp' => $now,
            'response_time' => $now,
        ]
    ];
    return new \Illuminate\Http\JsonResponse($data,$status);
}
