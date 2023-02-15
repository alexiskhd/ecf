<?php

namespace App\Controller;

use App\Entity\Medias;
use App\Form\MediasType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MediasController extends AbstractController
{
    #[Route('/medias', name: 'app_medias')]
    public function addmedia(Request $request, EntityManagerInterface $em): Response
    {
        $image = new Medias();
        $form = $this -> createForm(MediasType::class, $image);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $em->persist($image);
            $em->flush();
        
            return $this->redirectToRoute('app_main');
        }

        return $this->render('medias/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
