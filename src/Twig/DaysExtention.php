<?php

namespace App\Twig;

use App\Entity\Days;
use Twig\Extension\AbstactExtension;
use Doctrine\ORM\EntityManagerInterface;
use Twig\TwigFunction;

class DaysExtension extends AbstractExtension 
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
    }

    public function getFunctions(): array
    {
        return[
            new TwigFunction('days', [$this, 'getLunch'])
        ];
    }

    public function getLunch()
    {
        return $this->em->getRepository(Days::class)->findBy([]);
    }
}