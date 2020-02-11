<?php

namespace Domains\Location\Services\Contracts\DTOs;

/**
 * Class CityValueObject
 */
class CityDTO
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
    protected $Id;
    /**
     * @var ProvinceDTO
     */
    protected $province;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CityDTO
     */
    public function setName(string $name): CityDTO
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
     * @return CityDTO
     */
    public function setSlug(string $slug): CityDTO
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     * @return CityDTO
     */
    public function setId(int $Id): CityDTO
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return ProvinceDTO
     */
    public function getProvince(): ProvinceDTO
    {
        return $this->province;
    }

    /**
     * @param ProvinceDTO $province
     * @return CityDTO
     */
    public function setProvince(ProvinceDTO $province): CityDTO
    {
        $this->province = $province;
        return $this;
    }

}