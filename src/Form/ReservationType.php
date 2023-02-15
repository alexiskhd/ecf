<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Services;
use App\Repository\ServicesRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class,[
                'attr' => [
                    'class' => 'form-floating',
                    'id' => 'form-date'
                ],
                'widget' => 'single_text',
                'html5' => false
                
            ])

            ->add('heure', TimeType::class, [
                'placeholder' => 'choisir une heure',
                'hours' => array(12, 13, 14, 19, 20, 21),
                'minutes' => array(15, 30, 45),
                'attr' => [
                    'class' => 'form-floatingl'
                ]
            ])

            ->add('nombreDeCouvert', ChoiceType::class,[
                'attr' => [
                    'class' => 'form-floating'
                ],
                'choices' => [
                    'un' => 1,
                    'deux' => 2,
                    'trois' => 3,
                    'quatre' => 4,
                    'cinq' => 5,
                    'six' => 6,
                    'sept' => 7,
                    'huit' => 8,
                ]
            ])
            ->add('nom', TextType::class,[
                'attr' => [
                    'class' => 'form-floating'
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'téléphone',
                'attr' => [
                    'class' => 'form-floating'
                ]
            ])
            ->add('email', EmailType::class,[
                'attr' => [
                    'class' => 'form-floating'
                ]
            ])
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class
            
        ]);
    }
}

//EntityType::class, [
//  'choice_label' => 'name',
 //   'label' => 'Service',
//    'group_by' => 'parent.name',
//    'query_builder' => function(ServicesRepository $sr){
//        return $sr->createQueryBuilder('s')
 //       ->where('s.parent IS NOT NULL');
//    },