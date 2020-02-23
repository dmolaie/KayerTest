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
     * @var null
     */
    protected $currentAddress = null;
    /**
     * @var null
     */
    protected $phone = null;
    /**
     * @var null
     */
    protected $provinceOfWork = null;
    /**
     * @var null
     */
    protected $cityOfWork = null;
    /**
     * @var null
     */
    protected $email = null;
    /**
     * @var null
     */
    protected $essentialMobile = null;
    /**
     * @var null
     */
    protected $provinceOfBirth = null;
    /**
     * @var null
     */
    protected $cityOfBirth = null;
    /**
     * @var null
     */
    protected $identityNumber = null;
    /**
     * @var null
     */
    protected $jobTitle = null;
    /**
     * @var null
     */
    protected $educationalField = null;
    /**
     * @var null
     */
    protected $lastEducationalDegree = null;
    /**
     * @var null
     */
    protected $addressOfObtainingDegree = null;

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
    public function setPassword(string $password)
    {
        $this->password = $password;
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
     * @return null
     */
    public function getLastEducationalDegree()
    {
        return $this->lastEducationalDegree;
    }

    /**
     * @param null $lastEducationalDegree
     * @return UserRegisterInfoDTO
     */
    public function setLastEducationalDegree($lastEducationalDegree)
    {
        $this->lastEducationalDegree = $lastEducationalDegree;
        return $this;
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
     * @return null
     */
    public function getCurrentAddress()
    {
        return $this->currentAddress;
    }

    /**
     * @param null $currentAddress
     * @return UserRegisterInfoDTO
     */
    public function setCurrentAddress($currentAddress)
    {
        $this->currentAddress = $currentAddress;
        return $this;
    }

    /**
     * @return null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param null $phone
     * @return UserRegisterInfoDTO
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return null
     */
    public function getProvinceOfWork()
    {
        return $this->provinceOfWork;
    }

    /**
     * @param null $provinceOfWork
     * @return UserRegisterInfoDTO
     */
    public function setProvinceOfWork($provinceOfWork)
    {
        $this->provinceOfWork = $provinceOfWork;
        return $this;
    }

    /**
     * @return null
     */
    public function getCityOfWork()
    {
        return $this->cityOfWork;
    }

    /**
     * @param null $cityOfWork
     * @return UserRegisterInfoDTO
     */
    public function setCityOfWork($cityOfWork)
    {
        $this->cityOfWork = $cityOfWork;
        return $this;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     * @return UserRegisterInfoDTO
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null
     */
    public function getEssentialMobile()
    {
        return $this->essentialMobile;
    }

    /**
     * @param null $essentialMobile
     * @return UserRegisterInfoDTO
     */
    public function setEssentialMobile($essentialMobile)
    {
        $this->essentialMobile = $essentialMobile;
        return $this;
    }

    /**
     * @return null
     */
    public function getProvinceOfBirth()
    {
        return $this->provinceOfBirth;
    }

    /**
     * @param null $provinceOfBirth
     * @return UserRegisterInfoDTO
     */
    public function setProvinceOfBirth($provinceOfBirth)
    {
        $this->provinceOfBirth = $provinceOfBirth;
        return $this;
    }

    /**
     * @return null
     */
    public function getCityOfBirth()
    {
        return $this->cityOfBirth;
    }

    /**
     * @param null $cityOfBirth
     * @return UserRegisterInfoDTO
     */
    public function setCityOfBirth($cityOfBirth)
    {
        $this->cityOfBirth = $cityOfBirth;
        return $this;
    }

    /**
     * @return null
     */
    public function getIdentityNumber()
    {
        return $this->identityNumber;
    }

    /**
     * @param null $identityNumber
     * @return UserRegisterInfoDTO
     */
    public function setIdentityNumber($identityNumber)
    {
        $this->identityNumber = $identityNumber;
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
     * @return null
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param null $jobTitle
     * @return UserRegisterInfoDTO
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
        return $this;
    }

    /**
     * @return null
     */
    public function getEducationalField()
    {
        return $this->educationalField;
    }

    /**
     * @param null $educationalField
     * @return UserRegisterInfoDTO
     */
    public function setEducationalField($educationalField)
    {
        $this->educationalField = $educationalField;
        return $this;
    }

    /**
     * @return null
     */
    public function getAddressOfObtainingDegree()
    {
        return $this->addressOfObtainingDegree;
    }

    /**
     * @param null $addressOfObtainingDegree
     * @return UserRegisterInfoDTO
     */
    public function setAddressOfObtainingDegree($addressOfObtainingDegree)
    {
        $this->addressOfObtainingDegree = $addressOfObtainingDegree;
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

}