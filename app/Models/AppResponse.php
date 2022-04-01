<?php

namespace App\Models;

class AppResponse
{
    public static function success($data, $code = 200)
    {
        return response()->json([
            'success' => true, 
            'data' => $data
        ], $code);
    }

    public static function emptySuccess($code = 201)
    {
        return response()->json([
            'success' => true
        ], $code);
    }

    public static function error($message, $code = 400)
    {
        return response()->json([
            'success' => false, 
            'message' => $message
        ], $code);
    }
}