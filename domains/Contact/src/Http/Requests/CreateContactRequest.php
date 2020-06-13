<?php

namespace Domains\Contact\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Domains\Contact\Services\Contracts\DTOs\ContactCreateDTO;
use Illuminate\Validation\Rule;

class CreateContactRequest extends EhdaBaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required|string',
            'email'     => 'required|email',
            'mobile'    => 'required|regex:/(09)[0-9]{9}/',
            'content'   => 'required|string',
            'title'     => 'required|string',
            'type'      => ['required', Rule::in(config('contact.contactType'))]
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

    public function createContactCreateDTO(): ContactCreateDTO
    {
        $contactCreateDTO = new ContactCreateDTO();
        $contactCreateDTO->setFullName($this['full_name'])
            ->setEmail($this['email'])
            ->setType($this['type'])
            ->setMobile($this['mobile'])
            ->setTitle($this['title'])
            ->setContent($this['content']);
        return $contactCreateDTO;
    }
}
