<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="reg_seeker")
 */
class RegSeeker
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $fullName;

    /**
     * @ORM\Column(type="integer")
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="text")
     */
    private $motDePasse;

    /**
     * @ORM\Column(type="text")
     */
    private $city;

    /**
     * @ORM\Column(type="text")
     */
    private $managerFirstName;

    /**
     * @ORM\Column(type="text")
     */
    private $managerLastName;

    /**
     * @ORM\Column(type="text")
     */
    private $managerCinImage;

    // Ajoutez les getters et les setters pour chaque propriété...

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getManagerFirstName(): ?string
    {
        return $this->managerFirstName;
    }

    public function setManagerFirstName(string $managerFirstName): self
    {
        $this->managerFirstName = $managerFirstName;

        return $this;
    }

    public function getManagerLastName(): ?string
    {
        return $this->managerLastName;
    }

    public function setManagerLastName(string $managerLastName): self
    {
        $this->managerLastName = $managerLastName;

        return $this;
    }

    public function getManagerCinImage(): ?string
    {
        return $this->managerCinImage;
    }

    public function setManagerCinImage(string $managerCinImage): self
    {
        $this->managerCinImage = $managerCinImage;

        return $this;
    }
}
