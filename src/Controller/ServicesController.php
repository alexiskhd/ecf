<?php

namespace App\Controller;

use App\Entity\Services;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $service = new Services ();
        $service->setName('dejeuner');
        $entityManager=$doctrine->getManager();
        $entityManager->persist($service);

        $hour = new Services ();
        $hour->setName('12h00');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('12h15');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('12h30');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('12h45');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('13h00');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('13h15');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('13h30');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('13h45');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('14h00');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $service = new Services ();
        $service->setName('dîner');
        $entityManager=$doctrine->getManager();
        $entityManager->persist($service);

        $hour = new Services ();
        $hour->setName('19h00');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('19h15');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('19h30');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('19h45');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('20h00');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('20h15');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('20h30');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('20h45');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $hour = new Services ();
        $hour->setName('21h00');
        $hour->setParent($service);
        $entityManager=$doctrine->getManager();
        $entityManager->persist($hour);

        $entityManager->flush();


        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
        ]);
    }

    #[Route('/services', name: 'app_services')]
    public function showServices(ServicesRepository $servicesRepository): Response
    {
        return $this->render('services/index.html.twig', [
            'service' => $servicesRepository->findBy([])
        ]);
    } 
}
