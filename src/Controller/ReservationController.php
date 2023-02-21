<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Repository\HorairesRepository;
use App\Repository\ReservationRepository;
use App\Entity\Horaires;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;


class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function addreservation(Request $request, EntityManagerInterface $em): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $em->persist($reservation);
            $em->flush();

// si manque de temps ecrire msg flash : la demande de reservation est enregistré, une confirmation vous sera envoyé par email dans les plus bref delais
        $this->addFlash('success', 'Votre demande de réservation a été envoyé, vous recevrez une confirmation par email dans les plus bref délais');
        //return $this->redirectToRoute('app_accueil');
        }

        return $this->render('reservation/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function index(ReservationRepository $reservationRepository)
    {
        
    }

    
}
