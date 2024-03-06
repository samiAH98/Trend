<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $food = null;

    #[ORM\Column(length: 50)]
    private ?string $diy = null;

    #[ORM\Column(length: 50)]
    private ?string $hobby = null;

    #[ORM\Column(length: 50)]
    private ?string $clothing = null;

    #[ORM\Column(length: 50)]
    private ?string $multimedia = null;

    #[ORM\ManyToMany(targetEntity: Store::class, mappedBy: 'category')]
    private Collection $stores;

    #[ORM\ManyToOne(inversedBy: 'categorie')]
    private ?User $user = null;

    public function __construct()
    {
        $this->stores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFood(): ?string
    {
        return $this->food;
    }

    public function setFood(string $food): static
    {
        $this->food = $food;

        return $this;
    }

    public function getDiy(): ?string
    {
        return $this->diy;
    }

    public function setDiy(string $diy): static
    {
        $this->diy = $diy;

        return $this;
    }

    public function getHobby(): ?string
    {
        return $this->hobby;
    }

    public function setHobby(string $hobby): static
    {
        $this->hobby = $hobby;

        return $this;
    }

    public function getClothing(): ?string
    {
        return $this->clothing;
    }

    public function setClothing(string $clothing): static
    {
        $this->clothing = $clothing;

        return $this;
    }

    public function getMultimedia(): ?string
    {
        return $this->multimedia;
    }

    public function setMultimedia(string $multimedia): static
    {
        $this->multimedia = $multimedia;

        return $this;
    }

    /**
     * @return Collection<int, Store>
     */
    public function getStores(): Collection
    {
        return $this->stores;
    }

    public function addStore(Store $store): static
    {
        if (!$this->stores->contains($store)) {
            $this->stores->add($store);
            $store->addCategory($this);
        }

        return $this;
    }

    public function removeStore(Store $store): static
    {
        if ($this->stores->removeElement($store)) {
            $store->removeCategory($this);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
