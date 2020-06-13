<?php


namespace Domains\Contact\Services\Contracts\DTOs;


/**
 * Class CreateContactDTO
 */
class ContactFilterDTO
{
    /**
     * @var string|null
     */
    protected $fullName;
    /**
     * @var string|null
     */
    protected $email;
    /**
     * @var string|null
     */
    protected $mobile;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $title;
    /**
     * @var string
     */
    protected $sort = 'DESC';
    /**
     * @var int
     */
    protected $paginationCount = 10;

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     * @return ContactFilterDTO
     */
    public function setFullName(?string $fullName): ContactFilterDTO
    {
        $this->fullName = $fullName;
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
     * @return ContactFilterDTO
     */
    public function setEmail(?string $email): ContactFilterDTO
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @param string|null $mobile
     * @return ContactFilterDTO
     */
    public function setMobile(?string $mobile): ContactFilterDTO
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return ContactFilterDTO
     */
    public function setType(?string $type): ContactFilterDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return ContactFilterDTO
     */
    public function setTitle(?string $title): ContactFilterDTO
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSort():string
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     * @return ContactFilterDTO
     */
    public function setSort(string $sort): ContactFilterDTO
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaginationCount(): int
    {
        return $this->paginationCount;
    }

    /**
     * @param int $paginationCount
     * @return ContactFilterDTO
     */
    public function setPaginationCount(int $paginationCount): ContactFilterDTO
    {
        $this->paginationCount = $paginationCount;
        return $this;
    }



}