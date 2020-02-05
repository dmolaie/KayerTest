<?php

namespace App\Domains\Locations\ValueObjects;


/**
 * Class ProvinceValueObject
 */
class ProvinceValueObject
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
     * @return ProvinceValueObject
     */
    public function setName(string $name): ProvinceValueObject
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
     * @return ProvinceValueObject
     */
    public function setSlug(string $slug): ProvinceValueObject
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
     * @return ProvinceValueObject
     */
    public function setId(int $id): ProvinceValueObject
    {
        $this->id = $id;
        return $this;
    }


}