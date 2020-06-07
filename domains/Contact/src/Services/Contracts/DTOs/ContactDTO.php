<?php


namespace Domains\Contact\Services\Contracts\DTOs;


/**
 * Class ContactDTO
 */
class ContactDTO
{
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var string
     */
    protected $fullName;
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $mobile;

    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $createdAt;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return ContactDTO
     */
    public function setId($id): ContactDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return ContactDTO
     */
    public function setFullName(string $fullName): ContactDTO
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return ContactDTO
     */
    public function setEmail(string $email): ContactDTO
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ContactDTO
     */
    public function setType(string $type): ContactDTO
    {
        $this->type = $type;
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
     * @return ContactDTO
     */
    public function setMobile(string $mobile): ContactDTO
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ContactDTO
     */
    public function setTitle(string $title): ContactDTO
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return ContactDTO
     */
    public function setCreatedAt(string $createdAt): ContactDTO
    {
        $this->createdAt = $createdAt;
        return $this;
    }

}