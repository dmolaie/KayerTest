<?php

namespace Domains\Locations\Services\Contracts\LocationDTOs;


/**
 * Class ProvinceValueObject
 */
class ProvinceDTO
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $slug;
    /**
     * @var integer
     */
    protected $id;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProvinceDTO
     */
    public function setName(string $name): ProvinceDTO
    {
        $this->name = $name;
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
     * @return ProvinceDTO
     */
    public function setSlug(string $slug): ProvinceDTO
    {
        $this->slug = $slug;
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
     * @return ProvinceDTO
     */
    public function setId(int $id): ProvinceDTO
    {
        $this->id = $id;
        return $this;
    }


}