<?php

namespace App\Entity\Seller;

use App\Entity\Addressing\Address;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\User\Model\User;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SellerRepository")
 */
class Seller extends User

{

    public const UNKNOWN_GENDER = 'u';
    public const MALE_GENDER = 'm';
    public const FEMALE_GENDER = 'f';

    public const DEFAULT_SELLER_ROLE = 'ROLE_SELLER_ACCESS';


    public function __construct()
    {
        parent::__construct();

        $this->roles = [self::DEFAULT_SELLER_ROLE];
        $this->createdAt = new \DateTime();

    }


    public function __toString(): string
    {
        return (string) $this->getEmail();
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface|null $updatedAt
     */
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }



    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $birthday;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $phoneNumber;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Addressing\Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $defaultAddress;




    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getDefaultAddress(): ?Address
    {
        return $this->defaultAddress;
    }

    public function setDefaultAddress(Address $defaultAddress): self
    {
        $this->defaultAddress = $defaultAddress;

        return $this;
    }



}
