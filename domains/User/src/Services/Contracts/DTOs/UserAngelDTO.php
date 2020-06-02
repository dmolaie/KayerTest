<?php


namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UserAngel
 */
class UserAngelDTO
{
    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $year;

    /**
     * @var null|string
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @var array
     */
    protected $imageProfile;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return array
     */
    public function getImageProfile(): array
    {
        return $this->imageProfile;
    }

    /**
     * @param array $imageProfile
     */
    public function setImageProfile(array $imageProfile): void
    {
        $this->imageProfile = $imageProfile;
    }

}