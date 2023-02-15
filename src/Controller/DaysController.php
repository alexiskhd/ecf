<?php

namespace App\Controller;

use App\Entity\Days;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DaysController extends AbstractController
{
    #[Route('/days', name: 'app_days')]
    public function index(): Response
    {

        return $this->render('days/index.html.twig', [
            'controller_name' => 'DaysController',
        ]);
    }
}
