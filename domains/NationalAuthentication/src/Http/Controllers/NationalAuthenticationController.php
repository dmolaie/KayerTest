<?php


namespace Domains\NationalAuthentication\Http\Controllers;


use App\Http\Controllers\EhdaBaseController;
use Illuminate\Http\Response;

class NationalAuthenticationController extends EhdaBaseController
{
    public function getNationalAuthenticationStatus()
    {
        return $this->response(
            config('nationalAuthentication.is_active'),
            Response::HTTP_OK
        );
    }
}