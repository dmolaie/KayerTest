<?php


namespace App\Http\Controllers;


class BaseController extends Controller
{
    public function response(array $data = [], int $code, $message = "")
    {
        return response()->json([
            'data' => $data,
            'status_code' => $code,
            'message' => $message
        ], $code);
    }
}