<?php


namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UserRegisterInfoDTO
 */
class UserRegisterInfoDTO
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $lastName;
    /**
     * @var string
     */
    protected $nationalCode;
    /**
     * @var string
     */
    protected $gender;
    /**
     * @var string
     */
    protected $dateOfBirth;
    /**
     * @var string
     */
    protected $mobile;
    /**
     * @var int
     */
    protected $currentProvinceId;
    /**
     * @var int
     */
    protected $currentCityId;
    /**
     * @var integer
     */
    protected $roleId;
    /**
     * @var string
     */
    protected $roleStatus;
    /**
     * @var string
     */
    protected $maritalStatus;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var string
     */
    protected $currentAddress;
    /**
     * @var null|string
     */
    protected $phone;
    /**
     * @var null|integer
     */
    protected $provinceOfWork;
    /**
     * @var null|integer
     */
    protected $cityOfWork;
    /**
     * @var null|string
     */
    protected $email;
    /**
     * @var null|string
     */
    protected $essentialMobile;
    /**
     * @var null|int
     */
    protected $provinceOfBirth;
    /**
     * @var null|int
     */
    protected $cityOfBirth;
    /**
     * @var null|string
     */
    protected $identityNumber;
    /**
     * @var null|string
     */
    protected $jobTitle;
    /**
     * @var null|string
     */
    protected $educationalField;
    /**
     * @var null|string
     */
    protected $lastEducationalDegree;
    /**
     * @var null|string
     */
    protected $addressOfObtainingDegree;
    /**
     * @var null|int
     */
    protected $dayOfCooperation;
    /**
     * @var null|string
     */
    protected $knowCommunityBy;
    /**
     * @var null|string
     */
    protected $motivationForCooperation;
    /**
     * @var null|string
     */
    protected $fieldOfActivities;
    /**
     * @var null|string
     */
    protected $addressOfWork;
    /**
     * @var null|string
     */
    protected $workPhone;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserRegisterInfoDTO
     */
    public function setName(string $name): UserRegisterInfoDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return UserRegisterInfoDTO
     */
    public function setLastName(string $lastName): UserRegisterInfoDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalCode(): string
    {
        return $this->nationalCode;
    }

    /**
     * @param string $nationalCode
     * @return UserRegisterInfoDTO
     */
    public function setNationalCode(string $nationalCode): UserRegisterInfoDTO
    {
        $this->nationalCode = $nationalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return UserRegisterInfoDTO
     */
    public function setGender(string $gender): UserRegisterInfoDTO
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $dateOfBirth
     * @return UserRegisterInfoDTO
     */
    public function setDateOfBirth(string $dateOfBirth): UserRegisterInfoDTO
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     * @return UserRegisterInfoDTO
     */
    public function setMobile(string $mobile): UserRegisterInfoDTO
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentProvinceId(): int
    {
        return $this->currentProvinceId;
    }

    /**
     * @param int $currentProvinceId
     * @return UserRegisterInfoDTO
     */
    public function setCurrentProvinceId(int $currentProvinceId): UserRegisterInfoDTO
    {
        $this->currentProvinceId = $currentProvinceId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentCityId(): int
    {
        return $this->currentCityId;
    }

    /**
     * @param int $currentCityId
     * @return UserRegisterInfoDTO
     */
    public function setCurrentCityId(int $currentCityId): UserRegisterInfoDTO
    {
        $this->currentCityId = $currentCityId;
        return $this;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param int $roleId
     * @return UserRegisterInfoDTO
     */
    public function setRoleId(int $roleId): UserRegisterInfoDTO
    {
        $this->roleId = $roleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoleStatus(): string
    {
        return $this->roleStatus;
    }

    /**
     * @param string $roleStatus
     * @return UserRegisterInfoDTO
     */
    public function setRoleStatus(string $roleStatus): UserRegisterInfoDTO
    {
        $this->roleStatus = $roleStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getMaritalStatus(): string
    {
        return $this->maritalStatus;
    }

    /**
     * @param string $maritalStatus
     * @return UserRegisterInfoDTO
     */
    public function setMaritalStatus(string $maritalStatus): UserRegisterInfoDTO
    {
        $this->maritalStatus = $maritalStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UserRegisterInfoDTO
     */
    public function setPassword(string $password): UserRegisterInfoDTO
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrentAddress(): string
    {
        return $this->currentAddress;
    }

    /**
     * @param string $currentAddress
     * @return UserRegisterInfoDTO
     */
    public function setCurrentAddress(string $currentAddress): UserRegisterInfoDTO
    {
        $this->currentAddress = $currentAddress;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return UserRegisterInfoDTO
     */
    public function setPhone(?string $phone): UserRegisterInfoDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getProvinceOfWork(): ?int
    {
        return $this->provinceOfWork;
    }

    /**
     * @param int|null $provinceOfWork
     * @return UserRegisterInfoDTO
     */
    public function setProvinceOfWork(?int $provinceOfWork): UserRegisterInfoDTO
    {
        $this->provinceOfWork = $provinceOfWork;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCityOfWork(): ?int
    {
        return $this->cityOfWork;
    }

    /**
     * @param int|null $cityOfWork
     * @return UserRegisterInfoDTO
     */
    public function setCityOfWork(?int $cityOfWork): UserRegisterInfoDTO
    {
        $this->cityOfWork = $cityOfWork;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return UserRegisterInfoDTO
     */
    public function setEmail(?string $email): UserRegisterInfoDTO
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEssentialMobile(): ?string
    {
        return $this->essentialMobile;
    }

    /**
     * @param string|null $essentialMobile
     * @return UserRegisterInfoDTO
     */
    public function setEssentialMobile(?string $essentialMobile): UserRegisterInfoDTO
    {
        $this->essentialMobile = $essentialMobile;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getProvinceOfBirth(): ?int
    {
        return $this->provinceOfBirth;
    }

    /**
     * @param int|null $provinceOfBirth
     * @return UserRegisterInfoDTO
     */
    public function setProvinceOfBirth(?int $provinceOfBirth): UserRegisterInfoDTO
    {
        $this->provinceOfBirth = $provinceOfBirth;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCityOfBirth(): ?int
    {
        return $this->cityOfBirth;
    }

    /**
     * @param int|null $cityOfBirth
     * @return UserRegisterInfoDTO
     */
    public function setCityOfBirth(?int $cityOfBirth): UserRegisterInfoDTO
    {
        $this->cityOfBirth = $cityOfBirth;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdentityNumber(): ?string
    {
        return $this->identityNumber;
    }

    /**
     * @param string|null $identityNumber
     * @return UserRegisterInfoDTO
     */
    public function setIdentityNumber(?string $identityNumber): UserRegisterInfoDTO
    {
        $this->identityNumber = $identityNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    /**
     * @param string|null $jobTitle
     * @return UserRegisterInfoDTO
     */
    public function setJobTitle(?string $jobTitle): UserRegisterInfoDTO
    {
        $this->jobTitle = $jobTitle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEducationalField(): ?string
    {
        return $this->educationalField;
    }

    /**
     * @param string|null $educationalField
     * @return UserRegisterInfoDTO
     */
    public function setEducationalField(?string $educationalField): UserRegisterInfoDTO
    {
        $this->educationalField = $educationalField;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastEducationalDegree(): ?string
    {
        return $this->lastEducationalDegree;
    }

    /**
     * @param string|null $lastEducationalDegree
     * @return UserRegisterInfoDTO
     */
    public function setLastEducationalDegree(?string $lastEducationalDegree): UserRegisterInfoDTO
    {
        $this->lastEducationalDegree = $lastEducationalDegree;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressOfObtainingDegree(): ?string
    {
        return $this->addressOfObtainingDegree;
    }

    /**
     * @param string|null $addressOfObtainingDegree
     * @return UserRegisterInfoDTO
     */
    public function setAddressOfObtainingDegree(?string $addressOfObtainingDegree): UserRegisterInfoDTO
    {
        $this->addressOfObtainingDegree = $addressOfObtainingDegree;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDayOfCooperation(): ?int
    {
        return $this->dayOfCooperation;
    }

    /**
     * @param int|null $dayOfCooperation
     * @return UserRegisterInfoDTO
     */
    public function setDayOfCooperation(?int $dayOfCooperation): UserRegisterInfoDTO
    {
        $this->dayOfCooperation = $dayOfCooperation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getKnowCommunityBy(): ?string
    {
        return $this->knowCommunityBy;
    }

    /**
     * @param string|null $knowCommunityBy
     * @return UserRegisterInfoDTO
     */
    public function setKnowCommunityBy(?string $knowCommunityBy): UserRegisterInfoDTO
    {
        $this->knowCommunityBy = $knowCommunityBy;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMotivationForCooperation(): ?string
    {
        return $this->motivationForCooperation;
    }

    /**
     * @param string|null $motivationForCooperation
     * @return UserRegisterInfoDTO
     */
    public function setMotivationForCooperation(?string $motivationForCooperation): UserRegisterInfoDTO
    {
        $this->motivationForCooperation = $motivationForCooperation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFieldOfActivities(): ?string
    {
        return $this->fieldOfActivities;
    }

    /**
     * @param string|null $fieldOfActivities
     * @return UserRegisterInfoDTO
     */
    public function setFieldOfActivities(?string $fieldOfActivities): UserRegisterInfoDTO
    {
        $this->fieldOfActivities = $fieldOfActivities;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressOfWork(): ?string
    {
        return $this->addressOfWork;
    }

    /**
     * @param string|null $addressOfWork
     * @return UserRegisterInfoDTO
     */
    public function setAddressOfWork(?string $addressOfWork): UserRegisterInfoDTO
    {
        $this->addressOfWork = $addressOfWork;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWorkPhone(): ?string
    {
        return $this->workPhone;
    }

    /**
     * @param string|null $workPhone
     * @return UserRegisterInfoDTO
     */
    public function setWorkPhone(?string $workPhone): UserRegisterInfoDTO
    {
        $this->workPhone = $workPhone;
        return $this;
    }

}