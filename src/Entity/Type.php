<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $theater = null;

    #[ORM\Column(length: 50)]
    private ?string $hobbies = null;

    #[ORM\Column(length: 50)]
    private ?string $concert = null;

    #[ORM\Column(length: 50)]
    private ?string $art = null;

    #[ORM\OneToOne(mappedBy: 'type', cascade: ['persist', 'remove'])]
    private ?Event $event = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheater(): ?string
    {
        return $this->theater;
    }

    public function setTheater(string $theater): static
    {
        $this->theater = $theater;

        return $this;
    }

    public function getHobbies(): ?string
    {
        return $this->hobbies;
    }

    public function setHobbies(string $hobbies): static
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    public function getConcert(): ?string
    {
        return $this->concert;
    }

    public function setConcert(string $concert): static
    {
        $this->concert = $concert;

        return $this;
    }

    public function getArt(): ?string
    {
        return $this->art;
    }

    public function setArt(string $art): static
    {
        $this->art = $art;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): static
    {
        // unset the owning side of the relation if necessary
        if ($event === null && $this->event !== null) {
            $this->event->setType(null);
        }

        // set the owning side of the relation if necessary
        if ($event !== null && $event->getType() !== $this) {
            $event->setType($this);
        }

        $this->event = $event;

        return $this;
    }
}
