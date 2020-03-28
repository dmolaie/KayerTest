<?php


namespace Domains\Category\Services\Contracts\DTOs;


/**
 * Class CreateCategoryDTO
 */
class CategoryCreateDTO
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $name_fa;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $slug;
    /**
     * @var null
     */
    protected $parentId = null;
    /**
     * @var boolean
     */
    protected $status;

    /**
     * @return string
     */
    public function getNameEn(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CategoryCreateDTO
     */
    public function setNameEn(string $name): CategoryCreateDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameFa(): string
    {
        return $this->name_fa;
    }

    /**
     * @param string $name_fa
     * @return CategoryCreateDTO
     */
    public function setNameFa(string $name_fa): CategoryCreateDTO
    {
        $this->name_fa = $name_fa;
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
     * @return CategoryCreateDTO
     */
    public function setType(string $type): CategoryCreateDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return null
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param null $parentId
     * @return CategoryCreateDTO
     */
    public function setParentId($parentId): CategoryCreateDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     * @return CategoryCreateDTO
     */
    public function setStatus(bool $status): CategoryCreateDTO
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return CategoryCreateDTO
     */
    public function setSlug(string $slug): CategoryCreateDTO
    {
        $this->slug = $slug;
        return $this;
    }


}