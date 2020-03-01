<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;

class UserRegisterRequest extends EhdaBaseRequest
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
            'national_code'           => ['required', 'numeric', new NationalCodeRequest],
            'gender'                  => 'required|integer|max:2|min:0',
            'name'                    => 'required|string|max:30|min:3',
            'last_name'               => 'required|string|max:30|min:3',
            'father_name'             => 'required|string|max:30|min:3',
            'identity_number'         => 'numeric|min:1',
            'province_of_birth'       => 'integer',
            'city_of_birth'           => 'integer',
            'date_of_birth'           => 'required|numeric',
            'job_title'               => 'string|max:50|min:3',
            'last_education_degree' => 'required|integer|max:8|min:0',
            'phone'                   => 'regex:/^0\d{2,3}\d{8}$/',
            'mobile'                  => 'required|regex:/(09)[0-9]{9}/',
            'current_province_id'     => 'required|integer',
            'current_city_id'         => 'required|integer',
            'email'                   => 'string|email|max:255',
            'education_field'       => 'string|max:50|min:3',
            'education_province_id'   => 'integer',
            'education_city_id'       => 'integer',
            'current_address'         => 'string|min:3|max:150',
            'home_postal_code'        => 'regex:/\d{10}/',
            'password'                => 'required|confirmed|min:8',
        ];
    }

    public function messages()
    {
        return trans('user::validation');
    }

    public function attributes()
    {
        return trans('user::validation.attributes');
    }

    public function createUserRegisterDTO(): UserRegisterInfoDTO
    {
        $userRegisterDTO = new UserRegisterInfoDTO();
        $userRegisterDTO->setNationalCode($this['national_code'])
            ->setGender(config('user.user_genders')[$this['gender']])
            ->setName($this['name'])
            ->setLastName($this['last_name'])
            ->setFatherName($this['father_name'])
            ->setIdentityNumber($this['identity_number'])
            ->setProvinceOfBirth($this['province_of_birth'])
            ->setCityOfBirth($this['city_of_birth'])
            ->setDateOfBirth(Carbon::createFromTimestamp($this['date_of_birth'])->toDateString())
            ->setJobTitle($this['job_title'])
            ->setLastEducationDegree(config('user.education_degree')[$this['last_education_degree']])
            ->setPhone($this['phone'])
            ->setMobile($this['mobile'])
            ->setCurrentCityId($this['current_city_id'])
            ->setCurrentProvinceId($this['current_province_id'])
            ->setEmail($this['email'])
            ->setEducationField($this['education_field'])
            ->setEducationProvinceId($this['education_province_id'])
            ->setEducationCityId($this['education_city_id'])
            ->setCurrentAddress($this['current_address'])
            ->setHomePostalCode($this['home_postal_code'])
            ->setPassword($this['password'])
            ->setRoleId(config('user.client_role_id'))
            ->setRoleStatus(config('user.user_role_active_status'));

        return $userRegisterDTO;
    }
}
