<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class Address
{
    /**
     * @var string | null
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $street;

    /**
     * @var int | null
     * @ORM\Column(type="string")
     * @Assert\GreaterThanOrEqual(1)
     */
    private $number;

    /**
     * @var string | null
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * @var string | null
     * @ORM\Column(type="string")
     * @Assert\Regex("/^\d{2}-\d{3}$/")
     */
    private $code;

    /**
     * @return string | null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string | null $street
     */
    public function setStreet(?string $street = null): void
    {
        $this->street = $street;
    }

    /**
     * @return int | null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int|null $number
     */
    public function setNumber(?int $number = null): void
    {
        $this->number = $number;
    }

    /**
     * @return string | null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string | null $city
     */
    public function setCity(?string $city = null): void
    {
        $this->city = $city;
    }

    /**
     * @return string | null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string | null $code
     */
    public function setCode(?string $code = null): void
    {
        $this->code = $code;
    }
}