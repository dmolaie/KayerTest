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
     * @var null
     */
    protected $parentId = null;

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


}