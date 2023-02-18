<?php

namespace App\Helpers;

class ApiFormatter {
    protected static $response = [
        'code' => null,
        'message' => null,
        'founded' => null,
        'data' => null,
    ];

    public static function createApi($code = null, $message = null, $founded = null, $data = null)
    {
        self::$response['code']= $code;
        self::$response['message']= $message;
        self::$response['founded']= $founded;
        self::$response['data']= $data;

        return response()->json(self::$response, self::$response['code']);
    }
}