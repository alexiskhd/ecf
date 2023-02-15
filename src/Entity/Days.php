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

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $jour = null;

    #[ORM\ManyToMany(targetEntity: Horaires::class, inversedBy: 'days')]
    private Collection $horaire;

    public function __construct()
    {
        $this->horaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?\DateTimeInterface
    {
        return $this->jour;
    }

    public function setJour(\DateTimeInterface $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * @return Collection<int, Horaires>
     */
    public function getHoraire(): Collection
    {
        return $this->horaire;
    }

    public function addHoraire(Horaires $horaire): self
    {
        if (!$this->horaire->contains($horaire)) {
            $this->horaire->add($horaire);
        }

        return $this;
    }

    public function removeHoraire(Horaires $horaire): self
    {
        $this->horaire->removeElement($horaire);

        return $this;
    }
}
