<?php

namespace App\Domains\Locations\ValueObjects;

/**
 * Class CityValueObject
 */
class CityValueObject
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
     * @var ProvinceValueObject
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
     * @return CityValueObject
     */
    public function setName(string $name): CityValueObject
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
     * @return CityValueObject
     */
    public function setSlug(string $slug): CityValueObject
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
     * @return CityValueObject
     */
    public function setId(int $Id): CityValueObject
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return ProvinceValueObject
     */
    public function getProvince(): ProvinceValueObject
    {
        return $this->province;
    }

    /**
     * @param ProvinceValueObject $province
     * @return CityValueObject
     */
    public function setProvince(ProvinceValueObject $province): CityValueObject
    {
        $this->province = $province;
        return $this;
    }

}