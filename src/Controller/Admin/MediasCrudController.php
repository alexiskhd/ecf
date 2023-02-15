<?php

namespace App\Controller\Admin;

use App\Entity\Medias;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichImageType;



class MediasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Medias::class;
    }

    
  public function configureFields(string $pageName): iterable
    {

        return [
            TextField::new('name'),
            TextEditorField::new('description'),
            ImageField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setLabel('Image')
                
        ];
        
    }
    
}
