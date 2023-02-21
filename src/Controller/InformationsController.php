<?php

namespace App\Controller;

use App\Repository\DaysRepository;
use App\Entity\Days;
use App\Entity\Horaires;
use App\Entity\Reservation;
use App\Repository\HorairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class InformationsController extends AbstractController
{
    #[Route('/informations', name: 'app_informations')]
    
    public function index()
    {
        return $this->render('informations/index.html.twig', [
            'controller_name' => 'informationsController'
        ]);
    }
}
