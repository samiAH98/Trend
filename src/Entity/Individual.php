<?php

namespace App\Entity;

use App\Repository\IndividualRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IndividualRepository::class)]
class Individual extends User
{
    #[ORM\Column(length: 100)]
    private ?string $lastname = null;

    #[ORM\Column(length: 100)]
    private ?string $firstname = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 50)]
    private ?string $familySituation = null;

    #[ORM\Column]
    private ?int $ageRange = null;

    #[ORM\Column(length: 50)]
    private ?string $centerInterest = null;

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getFamilySituation(): ?string
    {
        return $this->familySituation;
    }

    public function setFamilySituation(string $familySituation): static
    {
        $this->familySituation = $familySituation;

        return $this;
    }

    public function getAgeRange(): ?int
    {
        return $this->ageRange;
    }

    public function setAgeRange(int $ageRange): static
    {
        $this->ageRange = $ageRange;

        return $this;
    }

    public function getCenterInterest(): ?string
    {
        return $this->centerInterest;
    }

    public function setCenterInterest(string $centerInterest): static
    {
        $this->centerInterest = $centerInterest;

        return $this;
    }
}
