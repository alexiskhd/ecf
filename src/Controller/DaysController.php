<?php

namespace App\Controller;

use App\Entity\Days;
use App\Repository\DaysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DaysController extends AbstractController
{
    #[Route('/days', name: 'app_days')]
    
    public function showHoraires(DaysRepository $daysRepository)
    {
        return $this->render('/_partials/_footer.html.twig', [
            'days' => $daysRepository->findBy([])
        ]);
    }
}