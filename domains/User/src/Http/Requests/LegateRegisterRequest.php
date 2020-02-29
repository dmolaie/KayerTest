<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\User\Services\Contracts\DTOs\LegateRegisterDTO;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;

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
            'national_code'              => ['required', 'numeric', new NationalCodeRequest],
            'gender'                     => 'required|integer|max:2|min:0',
            'name'                       => 'required|string|max:30|min:3',
            'last_name'                  => 'required|string|max:30|min:3',
            'father_name'                => 'required|string|max:30|min:3',
            'identity_number'            => 'required|numeric|min:1',
            'province_of_birth'          => 'required|integer',
            'city_of_birth'              => 'required|integer',
            'date_of_birth'              => 'required|numeric',
            'job_title'                  => 'required|string|max:50|min:3',
            'last_education_degree'    => 'required|integer|max:8|min:0',
            'phone'                      => 'required|regex:/^0\d{2,3}\d{8}$/',
            'mobile'                     => 'required|regex:/(09)[0-9]{9}/',
            'essential_mobile'           => 'required|regex:/(09)[0-9]{9}/',
            'current_province_id'        => 'required|integer',
            'current_city_id'            => 'required|integer',
            'email'                      => 'required|string|email|max:255',
            'marital_status'             => 'required|integer|min:0|max:1',
            'education_field'          => 'required|string|max:50|min:3',
            'education_province_id'      => 'required|integer',
            'education_city_id'          => 'required|integer',
            'current_address'            => 'required|string|min:3|max:150',
            'home_postal_code'           => 'regex:/\d{10}/',
            'province_of_work'           => 'integer',
            'city_of_work'               => 'integer',
            'address_of_work'            => 'string|min:3|max:100',
            'work_phone'                 => 'regex:/^0\d{2,3}\d{8}$/',
            'work_postal_code'           => 'regex:/\d{10}/',
            'know_community_by'          => 'required|integer|min:0|max:3',
            'motivation_for_cooperation' => 'required|string|max:100|min:3',
            'day_of_cooperation'         => 'required|integer|min:1|max:30',
            'field_of_activities'        => 'required|array|min:1',
            'field_of_activities.*'      => 'required|integer|distinct|min:0|max:12',
            'password'                   => 'required|confirmed|min:6',
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
        $userRegisterInfoDTO->setNationalCode($this['national_code'])
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
            ->setEssentialMobile($this['essential_mobile'])
            ->setCurrentCityId($this['current_city_id'])
            ->setCurrentProvinceId($this['current_province_id'])
            ->setEmail($this['email'])
            ->setMaritalStatus(config('user.user_marital_statuses')[$this['marital_status']])
            ->setEducationField($this['education_field'])
            ->setEducationProvinceId($this['education_province_id'])
            ->setEducationCityId($this['education_city_id'])
            ->setCurrentAddress($this['current_address'])
            ->setHomePostalCode($this['home_postal_code'])
            ->setProvinceOfWork($this['province_of_work'])
            ->setCityOfWork($this['city_of_work'])
            ->setAddressOfWork($this['address_of_work'])
            ->setWorkPhone($this['work_phone'])
            ->setWorkPostalCode($this['work_postal_code'])
            ->setKnowCommunityBy(config('user.know_community_by')[$this['know_community_by']])
            ->setMotivationForCooperation($this['motivation_for_cooperation'])
            ->setDayOfCooperation($this['day_of_cooperation'])
            ->setFieldOfActivities(implode(',',$this['field_of_activities']))
            ->setPassword($this['password'])
            ->setRoleId(config('user.legate_role_id'))
            ->setRoleStatus(config('user.user_role_pending_status'));

        return $userRegisterInfoDTO;
    }
}
