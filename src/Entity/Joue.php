<?php

namespace App\Entity;

use App\Repository\JoueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoueRepository::class)]
class Joue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Film $film = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Acteur $acteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): static
    {
        $this->film = $film;

        return $this;
    }

    public function getActeur(): ?Acteur
    {
        return $this->acteur;
    }

    public function setActeur(?Acteur $acteur): static
    {
        $this->acteur = $acteur;

        return $this;
    }
}
