<?php


namespace Domains\Category\Services\Contracts\DTOs;


/**
 * Class CategoryDTO
 */
class CategoryDTO
{

    /**
     * @var string
     */
    protected $name;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CategoryDTO
     */
    public function setName(string $name): CategoryDTO
    {
        $this->name = $name;
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

}