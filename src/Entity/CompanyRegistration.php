<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "companyregistration")]
class CompanyRegistration
{
    #[ORM\Id]
    #[ORM\Column(type: "string", length: 255)]
    private $email;

    #[ORM\Column(type: "string", length: 255)]
    private $companyName;
    
    #[ORM\Column(type: "string", length: 255)]
    private $city;


    #[ORM\Column(type: "text")]
    private $firstName;

    #[ORM\Column(type: "text")]
    private $lastName;

    #[ORM\Column(type: "integer")]
    private $phoneNumber;

    #[ORM\Column(type: "text")]
    private $motDePasse;

    #[ORM\Column(type: "text")]
    private $managercinimage;

   

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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

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

    public function getmanagercinimage(): ?string
    {
        return $this->managercinimage;
    }

    public function setmanagercinimage(string $managercinimage): self
    {
        $this->managercinimage = $managercinimage;

        return $this;
    }

    public function getcompanyname(): ?string
    {
        return $this->companyName;
    }

    public function setcompanyname(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }
}
