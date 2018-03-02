<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     */
    private $name;
    /**
     * @var string | null
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your surnamname cannot contain a number"
     * )
     */
    private $surname;
    /**
     * @var string | null
     * @ORM\Column(type="string", unique=true)
     * @Assert\NotBlank()
     */
    private $phoneNumber;

    /**
     * @var Address
     * @ORM\Embedded(class="Address", columnPrefix=false)
     * @Assert\Valid()
     */
    private $address;

    public function __construct()
    {
        $this->address = new Address();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string | null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string | null $name
     */
    public function setName(?string $name = null): void
    {
        $this->name = $name;
    }

    /**
     * @return string | null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string | null $surname
     */
    public function setSurname(?string $surname = null): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string | null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string | null $phoneNumber
     */
    public function setPhoneNumber(?string $phoneNumber = null): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;

    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

}
