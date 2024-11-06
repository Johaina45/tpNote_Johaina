<?php

namespace App\Entity;

use App\Repository\RealiseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealiseRepository::class)]
class Realise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Film $film = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Realisateur $realisateur = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRealisateur(): ?Realisateur
    {
        return $this->realisateur;
    }

    public function setRealisateur(?Realisateur $realisateur): static
    {
        $this->realisateur = $realisateur;

        return $this;
    }
}
