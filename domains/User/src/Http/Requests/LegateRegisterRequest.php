<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\User\Services\Contracts\DTOs\LegateRegisterDTO;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;
use Illuminate\Validation\Rule;

class LegateRegisterRequest extends EhdaBaseRequest
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
            'national_code'               => ['required', 'numeric', 'unique:users', new NationalCodeRequest],
            'name'                        => 'required|string|max:30|min:3',
            'last_name'                   => 'required|string|max:30|min:3',
            'gender'                      => 'required|in:male,female,other',
            'date_of_birth'               => 'required|numeric',
            'mobile'                      => 'required|regex:/(09)[0-9]{9}/',
            'current_province_id'         => 'required|integer',
            'current_city_id'             => 'required|integer',
            'marital_status'              => 'required|string|in:married,single,other',
            'password'                    => 'required|confirmed|min:6',
            'current_address'             => 'required|string|min:3|max:100',
            'phone'                       => 'required|regex:/^0\d{2,3}\d{8}$/',
            'email'                       => 'required|string|email|max:255|unique:users',
            'essential_mobile'            => 'required|regex:/(09)[0-9]{9}/',
            'job_title'                   => 'required|string|max:50|min:3',
            'educational_field'           => 'required|string|max:50|min:3',
            'last_educational_degree'     => [
                'required',
                'string',
                'max:50',
                'min:3',
                Rule::in(config('user.educational_degree'))
            ],
            'address_of_obtaining_degree' => 'required|string|max:100|min:3',
            'day_of_cooperation'          => 'required|integer|min:1|max:30',
            'know_community_by'           => 'required|string',
            'motivation_for_cooperation'  => 'required|string|max:100|min:3',
            'field_of_activities'         => 'required|array|min:1',
            'field_of_activities.*'       => 'required|integer|distinct|min:0|max:12',
            'address_of_work'             => 'string|min:3|max:100',
            'work_phone'                  => 'regex:/^0\d{2,3}\d{8}$/',
            'province_of_birth'           => 'integer',
            'city_of_birth'               => 'integer',
            'province_of_work'            => 'integer',
            'city_of_work'                => 'integer',
            'identity_number'             => 'numeric|min:1',
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
        $userRegisterInfoDTO = new UserRegisterInfoDTO();
        $userRegisterInfoDTO->setName($this['name'])
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
            ->setRoleId(config('user.legate_role_id'))
            ->setRoleStatus(config('user.user_role_pending_status'))
            ->setLastEducationalDegree($this['last_educational_degree'])
            ->setMotivationForCooperation($this['motivation_for_cooperation'])
            ->setFieldOfActivities(implode(',', $this['field_of_activities']))
            ->setDayOfCooperation($this['day_of_cooperation'])
            ->setKnowCommunityBy($this['know_community_by'])
            ->setWorkPhone($this['work_phone'])
            ->setAddressOfWork($this['address_of_work'])
        ;

        return $userRegisterInfoDTO;
    }
}
