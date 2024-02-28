<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $place = null;

    #[ORM\Column]
    private ?int $budget = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'event')]
    private Collection $users;

    #[ORM\OneToOne(inversedBy: 'event', cascade: ['persist', 'remove'])]
    private ?Type $type = null;

    #[ORM\ManyToOne(inversedBy: 'event')]
    private ?Partner $partner = null;

    #[ORM\OneToMany(targetEntity: UserPro::class, mappedBy: 'event')]
    private Collection $userPros;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->userPros = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getBudget(): ?int
    {
        return $this->budget;
    }

    public function setBudget(int $budget): static
    {
        $this->budget = $budget;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

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
            $user->setEvent($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getEvent() === $this) {
                $user->setEvent(null);
            }
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(?Partner $partner): static
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * @return Collection<int, UserPro>
     */
    public function getUserPros(): Collection
    {
        return $this->userPros;
    }

    public function addUserPro(UserPro $userPro): static
    {
        if (!$this->userPros->contains($userPro)) {
            $this->userPros->add($userPro);
            $userPro->setEvent($this);
        }

        return $this;
    }

    public function removeUserPro(UserPro $userPro): static
    {
        if ($this->userPros->removeElement($userPro)) {
            // set the owning side to null (unless already changed)
            if ($userPro->getEvent() === $this) {
                $userPro->setEvent(null);
            }
        }

        return $this;
    }
}
