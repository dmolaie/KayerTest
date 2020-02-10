<?php

namespace Domains\Admin\Http\Presenters;

use Domains\Admin\Services\Contracts\LoginDTOs\LoginDTO;

class LoginPresenter
{
    protected $loginDTO;

    /**
     * LoginPresenter constructor.
     * @param LoginDTO $loginDTO
     */
    public function __construct(LoginDTO $loginDTO)
    {
        $this->loginDTO = $loginDTO;
    }

    /**
     * @return array
     */
    public function transformMany(): array
    {
    }

    /**
     * @param LoginDTO $loginDTO
     * @return LoginDTO
     */
    public function transform(LoginDTO $loginDTO)
    {
        return [
            'name' => \Auth::user()->name,
            'national_code' => \Auth::user()->national_code,
            'role' => ['name' => $loginDTO->getRole()->name, 'id' => $loginDTO->getRole()->id],
            'token' => $loginDTO->getToken()
        ];
    }
}