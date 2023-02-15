<?php

namespace App\Controller\Admin;

use App\Entity\Days;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;


class DaysCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Days::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            Field::new('Jour'),
            TimeField::new('Heure'),
        ];
    }
    
}
