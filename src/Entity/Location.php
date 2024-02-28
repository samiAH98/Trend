<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $city = null;

    #[ORM\Column]
    private ?float $longitude = null;

    #[ORM\Column]
    private ?float $latitude = null;

    #[ORM\OneToOne(mappedBy: 'location', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToOne(mappedBy: 'location', cascade: ['persist', 'remove'])]
    private ?Store $store = null;

    #[ORM\OneToOne(mappedBy: 'location', cascade: ['persist', 'remove'])]
    private ?UserPro $userPro = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setLocation(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getLocation() !== $this) {
            $user->setLocation($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getStore(): ?Store
    {
        return $this->store;
    }

    public function setStore(?Store $store): static
    {
        // unset the owning side of the relation if necessary
        if ($store === null && $this->store !== null) {
            $this->store->setLocation(null);
        }

        // set the owning side of the relation if necessary
        if ($store !== null && $store->getLocation() !== $this) {
            $store->setLocation($this);
        }

        $this->store = $store;

        return $this;
    }

    public function getUserPro(): ?UserPro
    {
        return $this->userPro;
    }

    public function setUserPro(?UserPro $userPro): static
    {
        // unset the owning side of the relation if necessary
        if ($userPro === null && $this->userPro !== null) {
            $this->userPro->setLocation(null);
        }

        // set the owning side of the relation if necessary
        if ($userPro !== null && $userPro->getLocation() !== $this) {
            $userPro->setLocation($this);
        }

        $this->userPro = $userPro;

        return $this;
    }
}
