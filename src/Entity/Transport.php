<?php

namespace App\Entity;

use App\Repository\TransportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransportRepository::class)]
class Transport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $bus = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $bike = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $motorcycle = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $taxi = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $VTC = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $train = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $tram = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $airliner = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $boat = null;

    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'transport')]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBus(): ?string
    {
        return $this->bus;
    }

    public function setBus(?string $bus): static
    {
        $this->bus = $bus;

        return $this;
    }

    public function getBike(): ?string
    {
        return $this->bike;
    }

    public function setBike(?string $bike): static
    {
        $this->bike = $bike;

        return $this;
    }

    public function getMotorcycle(): ?string
    {
        return $this->motorcycle;
    }

    public function setMotorcycle(?string $motorcycle): static
    {
        $this->motorcycle = $motorcycle;

        return $this;
    }

    public function getTaxi(): ?string
    {
        return $this->taxi;
    }

    public function setTaxi(?string $taxi): static
    {
        $this->taxi = $taxi;

        return $this;
    }

    public function getVTC(): ?string
    {
        return $this->VTC;
    }

    public function setVTC(?string $VTC): static
    {
        $this->VTC = $VTC;

        return $this;
    }

    public function getTrain(): ?string
    {
        return $this->train;
    }

    public function setTrain(?string $train): static
    {
        $this->train = $train;

        return $this;
    }

    public function getTram(): ?string
    {
        return $this->tram;
    }

    public function setTram(?string $tram): static
    {
        $this->tram = $tram;

        return $this;
    }

    public function getAirliner(): ?string
    {
        return $this->airliner;
    }

    public function setAirliner(?string $airliner): static
    {
        $this->airliner = $airliner;

        return $this;
    }

    public function getBoat(): ?string
    {
        return $this->boat;
    }

    public function setBoat(?string $boat): static
    {
        $this->boat = $boat;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setTransport($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getTransport() === $this) {
                $user->setTransport(null);
            }
        }

        return $this;
    }
}
