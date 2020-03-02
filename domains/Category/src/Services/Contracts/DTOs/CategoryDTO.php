<?php


namespace Domains\Category\Services\Contracts\DTOs;


/**
 * Class CategoryDTO
 */
class CategoryDTO
{
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var string
     */
    protected $nameEn;
    /**
     * @var string
     */
    protected $nameFa;
    /**
     * @var string
     */
    protected $type;

    /**
     * @var mixed
     */
    protected $children;
    /**
     * @var boolean
     */
    protected $status;

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     * @return CategoryDTO
     */
    public function setStatus(bool $status): CategoryDTO
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameEn(): string
    {
        return $this->nameEn;
    }

    /**
     * @param string $nameEn
     * @return CategoryDTO
     */
    public function setNameEn(string $nameEn): CategoryDTO
    {
        $this->nameEn = $nameEn;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameFa(): string
    {
        return $this->nameFa;
    }

    /**
     * @param string $nameFa
     * @return CategoryDTO
     */
    public function setNameFa(string $nameFa): CategoryDTO
    {
        $this->nameFa = $nameFa;
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
     * @return CategoryDTO
     */
    public function setType(string $type): CategoryDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     * @return CategoryDTO
     */
    public function setChildren($children)
    {
        $this->children = $children;
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
     * @return CategoryDTO
     */
    public function setId(int $id): CategoryDTO
    {
        $this->id = $id;
        return $this;
    }

}