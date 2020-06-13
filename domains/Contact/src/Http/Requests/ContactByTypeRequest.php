<?php

namespace Domains\Contact\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Contact\Services\Contracts\DTOs\ContactFilterDTO;
use Illuminate\Validation\Rule;

class ContactByTypeRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'string',
            'title'     => 'string',
            'mobile'    => 'string',
            'email'     => 'string',
            'type'      => [Rule::in(config('contact.contactType'))],
            'sort'      => [Rule::in('DESC', 'ASC')],

        ];
    }

    public function messages()
    {
        return trans('contact::validation');
    }

    public function attributes()
    {
        return trans('contact::validation.attributes');
    }

    public function createContactFilterDTO(): ContactFilterDTO
    {
        $contactFilterDTO = new ContactFilterDTO();
        $contactFilterDTO->setFullName($this['full_name'])
            ->setEmail($this['email'])
            ->setType($this['type'])
            ->setMobile($this['mobile'])
            ->setSort($this['sort'] ?? 'DESC')
            ->setTitle($this['title']);
        return $contactFilterDTO;
    }
}
