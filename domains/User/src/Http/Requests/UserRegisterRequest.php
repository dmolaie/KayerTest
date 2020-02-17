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
            'national_code'               => ['required', 'numeric','unique:users', new NationalCodeRequest],
            'name'                        => 'required|alpha|max:20|min:3',
            'last_name'                   => 'required|alpha|max:20|min:3',
            'gender'                      => 'required|in:male,female,other',
            'date_of_birth'               => 'required|numeric',
            'mobile'                      => 'required|regex:/(09)[0-9]{9}/',
            'current_province_id'         => 'required|integer',
            'current_city_id'             => 'required|integer',
            'marital_status'              => 'required|string|in:married,single,other',
            'password'                    => 'required|confirmed|min:6',
            'current_address'             => 'string|min:3|max:100',
            'phone'                       => 'regex:/(0)[0-9]{12}/',
            'province_of_work'            => 'integer',
            'city_of_work'                => 'integer',
            'email'                       => 'string|email|max:255|unique:users',
            'essential_mobile'            => 'integer',
            'province_of_birth'           => 'integer',
            'city_of_birth'               => 'integer',
            'identity_number'             => 'integer|max:20|min:3',
            'job_title'                   => 'alpha|max:30|min:3',
            'educational_field'           => 'alpha|max:30|min:3',
            'last_educational_degree'     => 'alpha|max:30|min:3',
            'address_of_obtaining_degree' => 'alpha|max:30|min:3',
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
        $userRegisterDTO->setName($this['name'])
            ->setLastName($this['last_name'])
            ->setPhone($this['phone'])
            ->setProvinceOfWork($this['province_of_work'])
            ->setProvinceOfBirth($this['province_of_birth'])
            ->setNationalCode($this['national_code'])
            ->setMaritalStatus($this['marital_status'])
            ->setMobile($this['mobile'])
            ->setAddressOfObtainingDegree($this['address_of_obtaining_degree'])
            ->setCityOfBirth($this['city_of_birth'])
            ->setCityOfWork($this['city_of_work'])
            ->setCurrentAddress($this['current_address'])
            ->setCurrentCityId($this['current_city_id'])
            ->setCurrentProvinceId($this['current_province_id'])
            ->setDateOfBirth(Carbon::createFromTimestamp($this['date_of_birth'])->toDateString())
            ->setEducationalField($this['educational_field'])
            ->setEmail($this['email'])
            ->setEssentialMobile($this['essential_mobile'])
            ->setGender($this['gender'])
            ->setIdentityNumber($this['identity_number'])
            ->setJobTitle($this['job_title'])
            ->setPassword($this['password'])
            ->setRoleId(config('user.client_role_id'))
            ->setLastEducationalDegree($this['last_educational_degree']);

        return $userRegisterDTO;
    }
}
