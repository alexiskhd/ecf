<?php

namespace App\Entity;

use App\Repository\DaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DaysRepository::class)]
class Days
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    #[ORM\Column(length: 30)]
    private ?string $lunch = null;

    #[ORM\Column(length: 20)]
    private ?string $diner = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getLunch(): ?string
    {
        return $this->lunch;
    }

    public function setLunch(string $lunch): self
    {
        $this->lunch = $lunch;

        return $this;
    }

    public function getDiner(): ?string
    {
        return $this->diner;
    }

    public function setDiner(string $diner): self
    {
        $this->diner = $diner;

        return $this;
    }

    public function __toString()
    {
        return $this->lunch;
    }
}
