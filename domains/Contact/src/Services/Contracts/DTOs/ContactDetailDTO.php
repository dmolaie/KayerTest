<?php


namespace Domains\Contact\Services\Contracts\DTOs;


/**
 * Class ContactDetailDTO
 */
class ContactDetailDTO
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
     * @var string
     */
    protected $content;
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return ContactDetailDTO
     */
    public function setId($id): ContactDetailDTO
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
     * @return ContactDetailDTO
     */
    public function setFullName(string $fullName): ContactDetailDTO
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
     * @return ContactDetailDTO
     */
    public function setEmail(string $email): ContactDetailDTO
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
     * @return ContactDetailDTO
     */
    public function setType(string $type): ContactDetailDTO
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
     * @return ContactDetailDTO
     */
    public function setMobile(string $mobile): ContactDetailDTO
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
     * @return ContactDetailDTO
     */
    public function setTitle(string $title): ContactDetailDTO
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
     * @return ContactDetailDTO
     */
    public function setCreatedAt(string $createdAt): ContactDetailDTO
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return ContactDetailDTO
     */
    public function setContent(string $content): ContactDetailDTO
    {
        $this->content = $content;
        return $this;
    }

}