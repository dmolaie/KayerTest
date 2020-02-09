<?php

namespace Domains\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'national_code'           => 'required|integer',
            'first_name'              => 'required|alpha|max:20|min:3',
            'last_name'               => 'required|alpha|max:20|min:3',
            'gender'                  => 'required|in:male,female,other',
            'date_of_birth'           => 'required|date',
            'mobile'                  => 'required|regex:/(0)[1-9]{10}/',
            'current_province_id'     => 'required|integer',
            'current_city_id'         => 'required|integer',
            'current_address'         => 'string|min:3|max:100',
            'phone'                   => 'integer|regex:/(0)[1-9]{10}/',
            'province_of_work'        => 'integer',
            'city_of_work'            => 'integer',
            'email'                   => 'string|email|max:255|unique:users',
            'essential_mobile'        => 'integer',
            'province_of_birth'       => 'integer',
            'city_of_birth'           => 'integer',
            'identity_number'         => 'integer|max:20|min:3',
            'marital_status'          => 'string|in:married,single,other',
            'job_title'               => 'alpha|max:30|min:3',
            'educational_field'       => 'alpha|max:30|min:3',
            'last_education_degree'   => 'alpha|max:30|min:3',
            'address_of_obtaining_degree'       => 'alpha|max:30|min:3',
        ];
    }
}
