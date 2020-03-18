<?php


namespace App\Http\Controllers;


class EhdaBaseController extends Controller
{
    public function response(array $data = [], int $code, $message = "")
    {
        return response()->header('Access-Control-Allow-Origin', '*')->json([
            'data' => $data,
            'status_code' => $code,
            'message' => $message
        ], $code);
    }

}