<?php


namespace Domains\User\Services\Contracts\DTOs;


use Domains\Location\Services\Contracts\DTOs\CityDTO;

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
    protected $nationalCode;
    /**
     * @var string
     */
    protected $gender;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $lastName;
    /**
     * @var string|null
     */
    protected $fatherName;
    /**
     * @var null|string
     */
    protected $identityNumber;
    /**
     * @var null|array
     */
    protected $provinceOfBirth;
    /**
     * @var null|CityDTO
     */
    protected $cityOfBirth;
    /**
     * @var string
     */
    protected $dateOfBirth;
    /**
     * @var null|string
     */
    protected $jobTitle;
    /**
     * @var null|string
     */
    protected $lastEducationDegree;
    /**
     * @var null|string
     */
    protected $phone;
    /**
     * @var string
     */
    protected $mobile;
    /**
     * @var null|string
     */
    protected $essentialMobile;
    /**
     * @var array
     */
    protected $currentProvince;
    /**
     * @var CityDTO
     */
    protected $currentCity;
    /**
     * @var null|string
     */
    protected $email;
    /**
     * @var null|string
     */
    protected $maritalStatus;
    /**
     * @var null|string
     */
    protected $educationField;
    /**
     * @var null|array
     */
    protected $educationProvince;
    /**
     * @var null|CityDTO
     */
    protected $educationCity;
    /**
     * @var null|string
     */
    protected $homePostalCode;
    /**
     * @var null|array
     */
    protected $provinceOfWork;
    /**
     * @var null|CityDTO
     */
    protected $cityOfWork;
    /**
     * @var null|string
     */
    protected $addressOfWork;
    /**
     * @var null|string
     */
    protected $workPhone;
    /**
     * @var null|string
     */
    protected $workPostalCode;
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
     * @var null|array
     */
    protected $event;
    /**
     * @var null|boolean
     */
    protected $receiveEmail;
    /**
     * @var null|string
     */
    protected $currentAddress;
    /**
     * @var string
     */
    protected $cardId;
    /**
     * @var array
     */
    protected $roles;
    /**
     * @var null|string
     */
    protected $createdAt;
    /**
     * @var null|string
     */
    protected $updatedAt;
    /**
     * @var null|array
     */
    protected $createdBy;
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
     * @return string|null
     */
    public function getFatherName(): ?string
    {
        return $this->fatherName;
    }

    /**
     * @param string|null $fatherName
     * @return UserFullInfoDTO
     */
    public function setFatherName(?string $fatherName): UserFullInfoDTO
    {
        $this->fatherName = $fatherName;
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
     * @return array|null
     */
    public function getProvinceOfBirth(): ?array
    {
        return $this->provinceOfBirth;
    }

    /**
     * @param array|null $provinceOfBirth
     * @return UserFullInfoDTO
     */
    public function setProvinceOfBirth(?array $provinceOfBirth): UserFullInfoDTO
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
    public function getLastEducationDegree(): ?string
    {
        return $this->lastEducationDegree;
    }

    /**
     * @param string|null $lastEducationDegree
     * @return UserFullInfoDTO
     */
    public function setLastEducationDegree(?string $lastEducationDegree): UserFullInfoDTO
    {
        $this->lastEducationDegree = $lastEducationDegree;
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
     * @return array
     */
    public function getCurrentProvince(): array
    {
        return $this->currentProvince;
    }

    /**
     * @param array $currentProvince
     * @return UserFullInfoDTO
     */
    public function setCurrentProvince(array $currentProvince): UserFullInfoDTO
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
    public function getMaritalStatus(): ?string
    {
        return $this->maritalStatus;
    }

    /**
     * @param string|null $maritalStatus
     * @return UserFullInfoDTO
     */
    public function setMaritalStatus(?string $maritalStatus): UserFullInfoDTO
    {
        $this->maritalStatus = $maritalStatus;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEducationField(): ?string
    {
        return $this->educationField;
    }

    /**
     * @param string|null $educationField
     * @return UserFullInfoDTO
     */
    public function setEducationField(?string $educationField): UserFullInfoDTO
    {
        $this->educationField = $educationField;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getEducationProvince():?array
    {
        return $this->educationProvince;
    }

    /**
     * @param array|null $educationProvince
     * @return UserFullInfoDTO
     */
    public function setEducationProvince(?array $educationProvince): UserFullInfoDTO
    {
        $this->educationProvince = $educationProvince;
        return $this;
    }

    /**
     * @return CityDTO|null
     */
    public function getEducationCity(): ?CityDTO
    {
        return $this->educationCity;
    }

    /**
     * @param CityDTO|null $educationCity
     * @return UserFullInfoDTO
     */
    public function setEducationCity(?CityDTO $educationCity): UserFullInfoDTO
    {
        $this->educationCity = $educationCity;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHomePostalCode(): ?string
    {
        return $this->homePostalCode;
    }

    /**
     * @param string|null $homePostalCode
     * @return UserFullInfoDTO
     */
    public function setHomePostalCode(?string $homePostalCode): UserFullInfoDTO
    {
        $this->homePostalCode = $homePostalCode;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getProvinceOfWork(): ?array
    {
        return $this->provinceOfWork;
    }

    /**
     * @param array|null $provinceOfWork
     * @return UserFullInfoDTO
     */
    public function setProvinceOfWork(?array $provinceOfWork): UserFullInfoDTO
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
     * @return string|null
     */
    public function getWorkPostalCode(): ?string
    {
        return $this->workPostalCode;
    }

    /**
     * @param string|null $workPostalCode
     * @return UserFullInfoDTO
     */
    public function setWorkPostalCode(?string $workPostalCode): UserFullInfoDTO
    {
        $this->workPostalCode = $workPostalCode;
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
     * @return array|null
     */
    public function getEvent(): ?array
    {
        return $this->event;
    }

    /**
     * @param array|null $event
     * @return UserFullInfoDTO
     */
    public function setEvent(?array $event): UserFullInfoDTO
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getReceiveEmail(): ?bool
    {
        return $this->receiveEmail;
    }

    /**
     * @param bool|null $receiveEmail
     * @return UserFullInfoDTO
     */
    public function setReceiveEmail(?bool $receiveEmail): UserFullInfoDTO
    {
        $this->receiveEmail = $receiveEmail;
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
     * @return string
     */
    public function getCardId(): string
    {
        return $this->cardId;
    }

    /**
     * @param string $cardId
     * @return UserFullInfoDTO
     */
    public function setCardId(string $cardId): UserFullInfoDTO
    {
        $this->cardId = $cardId;
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
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param string|null $createdAt
     * @return UserFullInfoDTO
     */
    public function setCreatedAt(?string $createdAt): UserFullInfoDTO
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param string|null $updatedAt
     * @return UserFullInfoDTO
     */
    public function setUpdatedAt(?string $updatedAt): UserFullInfoDTO
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCreatedBy(): ?array
    {
        return $this->createdBy;
    }

    /**
     * @param array|null $createdBy
     * @return UserFullInfoDTO
     */
    public function setCreatedBy(?array $createdBy): UserFullInfoDTO
    {
        $this->createdBy = $createdBy;
        return $this;
    }




}