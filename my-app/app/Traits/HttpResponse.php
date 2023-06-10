<?php

namespace App\Traits;

trait HttpResponse
{
    protected function response($data, $message=null, $status = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}