<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class CategoriesController extends AbstractController
{
    #[Route('/menus', name: 'app_menus')]
    public function index(ManagerRegistry $doctrine): Response
    {

    // ------ ENTRÉES ----- //

        $parent = new Categories();
        $parent->setName('Entrées');
        $entityManager = $doctrine->getManager();
        $entityManager->persist($parent);

        $category = new Categories();
        $category->setName('Gravlax de Saumon');
        $category->setDescription('Jus de poire, basilic et passion, oeuf de truite');
        $category->setPrice(8);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $category = new Categories();
        $category->setName('Tourte de pomme de terre');
        $category->setDescription('Pomme de terre de Correze, celeri et oignons caramelisés, sauce au parmesans et jus de champignon');
        $category->setPrice(8);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $category = new Categories();
        $category->setName('Balade Forestière');
        $category->setDescription('Poêlée de champignon, bouillon de chataignes, marrons et noisettes');
        $category->setPrice(9);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

    // ------ PLATS ----- //

        $parent = new Categories();
        $parent->setName('Plats');
        $entityManager = $doctrine->getManager();
        $entityManager->persist($parent);

        $category = new Categories();
        $category->setName('Risotto de Crozet');
        $category->setDescription('Parmesan, langoutisnes accompagnées de carottes, courgettes et tomates confites, mélange d\'herbes fraîches');
        $category->setPrice(18);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $category = new Categories();
        $category->setName('Risotto de Crozet');
        $category->setDescription('Parmesan, langoutisnes accompagnées de carottes, courgettes et tomates confites, mélange d\'herbes fraîches');
        $category->setPrice(19);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $category = new Categories();
        $category->setName('Onglet de veau');
        $category->setDescription('Polenta crémeuse, parmesan condiment à l\'ail et jus de veau');
        $category->setPrice(20);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $category = new Categories();
        $category->setName('Choux fleur roti');
        $category->setDescription('Yaourt tahini, quinoa à la mangue et curcuma, citron noir, amandes');
        $category->setPrice(17);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

    // ----- DESERTS ----- //

        $parent = new Categories();
        $parent->setName('Déserts');
        $entityManager = $doctrine->getManager();
        $entityManager->persist($parent);

        $category = new Categories();
        $category->setName('Gâteau de savoie revisité');
        $category->setDescription('Crème de caramel, raisins poêlées');
        $category->setPrice(7);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $category = new Categories();
        $category->setName('Pavlova');
        $category->setDescription('Chantilly maison, glace du moment et fruits de saison');
        $category->setPrice(7);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $category = new Categories();
        $category->setName('Crémeux chocolat');
        $category->setDescription('Guimauve citronnelle et crêpes dentelles');
        $category->setPrice(7);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

    // ----- MENUS ----- // 

        $parent = new Categories();
        $parent->setName('Menus');
        $entityManager = $doctrine->getManager();
        $entityManager->persist($parent);

        $category = new Categories();
        $category->setName('Menu midi');
        $category->setDescription('Entrée/plat du jour ou plat du jour/desert');
        $category->setPrice(18);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $category = new Categories();
        $category->setName('Menu soir');
        $category->setDescription('Entrée - plat - desert (au choix sur la carte)');
        $category->setPrice(28);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $category = new Categories();
        $category->setName('Menu Decouverte');
        $category->setDescription('Entrée - plat poisson - plat viande - desert');
        $category->setPrice(45);
        $category->setParent($parent);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);

        $entityManager->flush();

        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
        ]);
    }
    #[Route('/menus', name: 'app_menus')]
    public function ShowMenus(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('categories/index.html.twig', [
            'Categories' => $categoriesRepository->findBy([])
        ]);
    }
}
