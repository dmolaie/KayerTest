<?php


namespace Domains\Contact\Services\Contracts\DTOs;


/**
 * Class CreateContactDTO
 */
class ContactCreateDTO
{
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
    protected $mobile;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $content;

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return ContactCreateDTO
     */
    public function setFullName(string $fullName): ContactCreateDTO
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
     * @return ContactCreateDTO
     */
    public function setEmail(string $email): ContactCreateDTO
    {
        $this->email = $email;
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
     * @return ContactCreateDTO
     */
    public function setMobile(string $mobile): ContactCreateDTO
    {
        $this->mobile = $mobile;
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
     * @return ContactCreateDTO
     */
    public function setType(string $type): ContactCreateDTO
    {
        $this->type = $type;
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
     * @return ContactCreateDTO
     */
    public function setTitle(string $title): ContactCreateDTO
    {
        $this->title = $title;
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
     * @return ContactCreateDTO
     */
    public function setContent(string $content): ContactCreateDTO
    {
        $this->content = $content;
        return $this;
    }

}