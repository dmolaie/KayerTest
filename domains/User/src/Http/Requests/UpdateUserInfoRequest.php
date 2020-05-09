<?php

namespace Domains\User\Http\Requests;

use App\Http\Request\EhdaBaseRequest;
use Carbon\Carbon;
use Domains\User\Services\Contracts\DTOs\LegateRegisterDTO;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;

class UpdateUserInfoRequest extends EhdaBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gender'                     => 'required|integer|max:2|min:0',
            'name'                       => 'required|string|max:30|min:3',
            'last_name'                  => 'required|string|max:30|min:3',
            'father_name'                => 'required|string|max:30|min:3',
            'identity_number'            => 'numeric|min:1',
            'province_of_birth'          => 'integer',
            'marital_status'             => 'integer',
            'city_of_birth'              => 'integer',
            'date_of_birth'              => 'required|numeric',
            'job_title'                  => 'string|max:50|min:3',
            'last_education_degree'      => 'required|integer|max:8|min:0',
            'phone'                      => 'regex:/^0\d{2,3}\d{8}$/',
            'mobile'                     => 'required|regex:/(09)[0-9]{9}/',
            'essential_mobile'           => 'regex:/(09)[0-9]{9}/',
            'current_province_id'        => 'required|integer',
            'current_city_id'            => 'required|integer',
            'email'                      => 'string|email|max:255',
            'education_field'            => 'string|max:50|min:3',
            'education_province_id'      => 'integer',
            'education_city_id'          => 'integer',
            'current_address'            => 'string|min:3|max:150',
            'home_postal_code'           => 'regex:/\d{10}/',
            'province_of_work'           => 'integer',
            'city_of_work'               => 'integer',
            'address_of_work'            => 'string|min:3|max:100',
            'work_phone'                 => 'regex:/^0\d{2,3}\d{8}$/',
            'work_postal_code'           => 'regex:/\d{10}/',
            'know_community_by'          => 'integer|min:0|max:3',
            'motivation_for_cooperation' => 'string|max:100|min:3',
            'day_of_cooperation'         => 'integer|min:1|max:30',
            'field_of_activities'        => 'array|min:1',
            'field_of_activities.*'      => 'integer|distinct|min:0|max:12',
            'password'                   => 'confirmed|min:8',
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

    public function createUserEditDTO(): UserRegisterInfoDTO
    {
        $userRegisterInfoDTO = new UserRegisterInfoDTO();
        $userRegisterInfoDTO
            ->setGender(config('user.user_genders')[$this['gender']])
            ->setName($this['name'])
            ->setLastName($this['last_name'])
            ->setFatherName($this['father_name'])
            ->setIdentityNumber($this['identity_number'])
            ->setProvinceOfBirth($this['province_of_birth'])
            ->setCityOfBirth($this['city_of_birth'])
            ->setDateOfBirth(Carbon::createFromTimestamp($this['date_of_birth'])->toDateString())
            ->setJobTitle($this['job_title'])
            ->setLastEducationDegree(isset($this['last_education_degree']) ? config('user.education_degree')[$this['last_education_degree']] : null)
            ->setPhone($this['phone'])
            ->setMobile($this['mobile'])
            ->setEssentialMobile($this['essential_mobile'])
            ->setCurrentCityId($this['current_city_id'])
            ->setCurrentProvinceId($this['current_province_id'])
            ->setEmail($this['email'])
            ->setMaritalStatus(isset($this['marital_status']) ? config('user.user_marital_statuses')[$this['marital_status']] : null)
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
            ->setKnowCommunityBy(isset($this['know_community_by']) ? config('user.know_community_by')[$this['know_community_by']] : null)
            ->setMotivationForCooperation($this['motivation_for_cooperation'])
            ->setDayOfCooperation($this['day_of_cooperation'])
            ->setFieldOfActivities(isset($this['field_of_activities']) ? implode(',',
                $this['field_of_activities']) : null)
            ->setRegisterType(config('user.user_register_type.by_user'))
            ->setPassword($this['password']);

        return $userRegisterInfoDTO;
    }
}
