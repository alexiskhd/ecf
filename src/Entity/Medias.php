<?php

namespace App\Entity;

use App\Repository\MediasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediasRepository::class)]
class Medias
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getname(): ?string
    {
        return $this->type;
    }

    public function setname(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
