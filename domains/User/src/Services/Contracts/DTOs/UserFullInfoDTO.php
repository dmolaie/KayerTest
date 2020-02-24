<?php


namespace Domains\User\Services\Contracts\DTOs;


use Domains\Location\Services\Contracts\DTOs\CityDTO;
use Domains\Location\Services\Contracts\DTOs\ProvinceDTO;

/**
 * Class UserFullInfoDTO
 */
class UserFullInfoDTO
{
    /**
     * @var integer
     */
    protected $id;
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
     * @var ProvinceDTO
     */
    protected $currentProvince;
    /**
     * @var CityDTO
     */
    protected $currentCity;
    /**
     * @var integer
     */
    protected $roleId;

    /**
     * @var string
     */
    protected $maritalStatus;

    /**
     * @var null|string
     */
    protected $currentAddress;
    /**
     * @var null|string
     */
    protected $phone;
    /**
     * @var null|ProvinceDTO
     */
    protected $provinceOfWork;
    /**
     * @var null|CityDTO
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
     * @var null|ProvinceDTO
     */
    protected $provinceOfBirth;
    /**
     * @var null|CityDTO
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
     * @var array
     */
    protected $roles;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserFullInfoDTO
     */
    public function setName(string $name): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setLastName(string $lastName): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setNationalCode(string $nationalCode): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setGender(string $gender): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setDateOfBirth(string $dateOfBirth): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setMobile(string $mobile): UserFullInfoDTO
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return ProvinceDTO
     */
    public function getCurrentProvince(): ProvinceDTO
    {
        return $this->currentProvince;
    }

    /**
     * @param ProvinceDTO $currentProvince
     * @return UserFullInfoDTO
     */
    public function setCurrentProvince(ProvinceDTO $currentProvince): UserFullInfoDTO
    {
        $this->currentProvince = $currentProvince;
        return $this;
    }

    /**
     * @return CityDTO
     */
    public function getCurrentCity(): CityDTO
    {
        return $this->currentCity;
    }

    /**
     * @param CityDTO $currentCity
     * @return UserFullInfoDTO
     */
    public function setCurrentCity(CityDTO $currentCity): UserFullInfoDTO
    {
        $this->currentCity = $currentCity;
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
     * @return UserFullInfoDTO
     */
    public function setRoleId(int $roleId): UserFullInfoDTO
    {
        $this->roleId = $roleId;
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
     * @return UserFullInfoDTO
     */
    public function setMaritalStatus(string $maritalStatus): UserFullInfoDTO
    {
        $this->maritalStatus = $maritalStatus;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrentAddress(): ?string
    {
        return $this->currentAddress;
    }

    /**
     * @param string|null $currentAddress
     * @return UserFullInfoDTO
     */
    public function setCurrentAddress(?string $currentAddress): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setPhone(?string $phone): UserFullInfoDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return ProvinceDTO|null
     */
    public function getProvinceOfWork(): ?ProvinceDTO
    {
        return $this->provinceOfWork;
    }

    /**
     * @param ProvinceDTO|null $provinceOfWork
     * @return UserFullInfoDTO
     */
    public function setProvinceOfWork(?ProvinceDTO $provinceOfWork): UserFullInfoDTO
    {
        $this->provinceOfWork = $provinceOfWork;
        return $this;
    }

    /**
     * @return CityDTO|null
     */
    public function getCityOfWork(): ?CityDTO
    {
        return $this->cityOfWork;
    }

    /**
     * @param CityDTO|null $cityOfWork
     * @return UserFullInfoDTO
     */
    public function setCityOfWork(?CityDTO $cityOfWork): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setEmail(?string $email): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setEssentialMobile(?string $essentialMobile): UserFullInfoDTO
    {
        $this->essentialMobile = $essentialMobile;
        return $this;
    }

    /**
     * @return ProvinceDTO|null
     */
    public function getProvinceOfBirth(): ?ProvinceDTO
    {
        return $this->provinceOfBirth;
    }

    /**
     * @param ProvinceDTO|null $provinceOfBirth
     * @return UserFullInfoDTO
     */
    public function setProvinceOfBirth(?ProvinceDTO $provinceOfBirth): UserFullInfoDTO
    {
        $this->provinceOfBirth = $provinceOfBirth;
        return $this;
    }

    /**
     * @return CityDTO|null
     */
    public function getCityOfBirth(): ?CityDTO
    {
        return $this->cityOfBirth;
    }

    /**
     * @param CityDTO|null $cityOfBirth
     * @return UserFullInfoDTO
     */
    public function setCityOfBirth(?CityDTO $cityOfBirth): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setIdentityNumber(?string $identityNumber): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setJobTitle(?string $jobTitle): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setEducationalField(?string $educationalField): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setLastEducationalDegree(?string $lastEducationalDegree): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setAddressOfObtainingDegree(?string $addressOfObtainingDegree): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setDayOfCooperation(?int $dayOfCooperation): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setKnowCommunityBy(?string $knowCommunityBy): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setMotivationForCooperation(?string $motivationForCooperation): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setFieldOfActivities(?string $fieldOfActivities): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setAddressOfWork(?string $addressOfWork): UserFullInfoDTO
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
     * @return UserFullInfoDTO
     */
    public function setWorkPhone(?string $workPhone): UserFullInfoDTO
    {
        $this->workPhone = $workPhone;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     * @return UserFullInfoDTO
     */
    public function setRoles(array $roles): UserFullInfoDTO
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UserFullInfoDTO
     */
    public function setId(int $id): UserFullInfoDTO
    {
        $this->id = $id;
        return $this;
    }


}