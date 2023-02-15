<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use App\Entity\Categories;
use App\Entity\Medias;
use App\Entity\Days;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can make your dashboard redirect to some common page of your backend
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le Quai Antique');
    }

  

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Réservations', 'fa fa-calendar')->setSubItems([
            MenuItem::linkToCrud('show reservation', 'fa fa-eye', Reservation::class),
            MenuItem::linkToCrud('add reservation', 'fa fa-plus', Reservation::class)->setAction(Crud::PAGE_NEW),
        ]);
        yield MenuItem::subMenu('Carte/Menus', 'fa fa-cutlery', Categories::class)->setSubItems([
            MenuItem::linkToCrud('show Carte/Menus', 'fa fa-eye', Categories::class),
            MenuItem::linkToCrud('edit Carte/Menus', 'fa-solid fa-pen-to-square', Categories::class)->setAction(Crud::PAGE_EDIT),
        ]);;

        yield MenuItem::linkToCrud('Horaires', 'fa-solid fa-clock', Days::class);
        yield MenuItem::linkToCrud('Médias', 'fa fa-photo-film', Medias::class);
      
       
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
