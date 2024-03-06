<?php

namespace App\Entity;

use App\Repository\ProfessionalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessionalRepository::class)]
class Professional extends User
{
    #[ORM\Column(length: 100)]
    private ?string $companyName = null;

    #[ORM\Column]
    private ?int $siretNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $businessActivity = null;


    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getSiretNumber(): ?int
    {
        return $this->siretNumber;
    }

    public function setSiretNumber(int $siretNumber): static
    {
        $this->siretNumber = $siretNumber;

        return $this;
    }

    public function getBusinessActivity(): ?string
    {
        return $this->businessActivity;
    }

    public function setBusinessActivity(string $businessActivity): static
    {
        $this->businessActivity = $businessActivity;

        return $this;
    }
}
