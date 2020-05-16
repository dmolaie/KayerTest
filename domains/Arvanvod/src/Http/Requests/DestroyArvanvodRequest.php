<?php

namespace Domains\Arvanvod\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanvodCreateDTO;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanvodListDTO;

class DestroyArvanvodRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return trans('arvanvod::validation');
    }

    public function attributes()
    {
        return trans('arvanvod::validation.attributes');
    }

    public function getUserIdDTO()
    {
        $arvanvodDestroyDTO = new ArvanvodListDTO();
        $arvanvodDestroyDTO->setUserId($this['user_id']);
        return $arvanvodDestroyDTO;
    }
}
