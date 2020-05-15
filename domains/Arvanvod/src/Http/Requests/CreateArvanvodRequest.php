<?php

namespace Domains\Event\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanvodCreateDTO;

class CreateArvanvodRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:arvanvod,id',
            'link' => 'required|string',
            'description' => 'string',
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

    public function ArvanvodCreateDTO()
    {
        $arvanvodCreateDTO = new ArvanvodCreateDTO();
        $arvanvodCreateDTO->setUserId($this['user_id'])
            ->setLink($this['link'])
            ->setDescription($this['description']);
        return $arvanvodCreateDTO;
    }
}
